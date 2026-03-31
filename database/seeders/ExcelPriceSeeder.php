<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\DeviceModel;
use App\Models\ServiceType;
use App\Models\Category;
use App\Models\Repair;
use Illuminate\Support\Str;

class ExcelPriceSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(database_path('seeders/pricedata.json'));
        $data = json_decode($json, true);

        // Ensure Apple brand exists
        $brand = Brand::firstOrCreate(
            ['name' => 'Apple'],
            ['slug' => 'apple', 'is_active' => true]
        );

        $category = Category::firstOrCreate(
            ['name' => 'Sửa Điện Thoại'],
            ['slug' => 'sua-dien-thoai', 'is_active' => true]
        );

        // Hủy is_featured cũ để thay thế bằng bảng giá mới
        Repair::query()->update(['is_featured' => false]);

        foreach ($data as $row) {
            if (!isset($row['MODEL'])) continue;

            $modelName = 'iPhone ' . trim($row['MODEL']);
            $deviceModel = DeviceModel::firstOrCreate(
                ['name' => $modelName, 'brand_id' => $brand->id, 'category_id' => $category->id],
                ['slug' => Str::slug($modelName), 'is_active' => true]
            );

            foreach ($row as $key => $value) {
                if ($key === 'MODEL') continue;

                $serviceName = trim(str_replace("\r\n", " ", $key));
                // Prepare service Type
                $serviceType = ServiceType::firstOrCreate(
                    ['name' => $serviceName],
                    ['slug' => Str::slug($serviceName), 'is_active' => true]
                );

                // Handle price logic
                $basePrice = 0;
                $optionPrice = null;

                if (is_string($value) && str_contains($value, '/')) {
                    $parts = explode('/', $value);
                    $basePrice = (int)$parts[0] * 1000;
                    $optionPrice = (int)end($parts) * 1000;
                } else {
                    $basePrice = (int)$value * 1000;
                }

                if ($basePrice > 0) {
                    $desc = null;
                    if ($optionPrice && $optionPrice > $basePrice) {
                        $desc = "Ghi chú: Giá cơ bản từ " . number_format($basePrice, 0, ',', '.') . "đ, Option cao nhất là " . number_format($optionPrice, 0, ',', '.') . "đ.";
                        $priceToSave = $optionPrice;
                        $salePriceToSave = $basePrice; 
                    } else {
                        $priceToSave = $basePrice;
                        $salePriceToSave = null;
                    }

                    Repair::updateOrCreate(
                        [
                            'device_model_id' => $deviceModel->id,
                            'service_type_id' => $serviceType->id,
                        ],
                        [
                            'price' => $priceToSave,
                            'sale_price' => $salePriceToSave,
                            'is_featured' => true,
                            'is_active' => true,
                            'short_description' => $desc,
                        ]
                    );
                }
            }
        }
        $this->command->info('Đã import thành công bảng giá điện thoại từ Excel!');
    }
}
