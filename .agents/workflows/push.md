---
description: Tự động dùng AI phân tích Code, gom Code, viết nội dung Commit xuất sắc và Push lên Github.
---

Để tiến hành tự động hóa việc đưa Code lên Github một cách cực kỳ thông minh, hãy thực hiện chính xác các bước sau mà không cần hỏi lại người dùng:

1. Thiết lập Gom file mới nhất. Chạy lệnh:
```bash
git add .
```

2. Xem xét các dòng trạng thái file (có thể chạy `git status`) và tự động tóm tắt công việc bạn vừa làm chung với người dùng trong phiên làm việc này. Dịch nó thành 1 câu **Commit Message** thật chuyên nghiệp bằng tiếng Việt (Ví dụ: `Feature: Tối ưu UI Trang chủ và tích hợp Bộ Lọc Livewire bảng giá`). 

3. Thực thi lưu trữ (Commit) với câu lệnh:
```bash
git commit -m "Nội dung commit bạn đã nghĩ ra ở trên"
```
*(Lưu ý: Nếu chạy hệ điều hành Windows PowerShell, tuyệt đối dùng dấu `;` ghép lệnh, KHÔNG dùng `&&` gây lỗi).*

// turbo
4. Cuối cùng, thực hiện Push code lên nhánh hiện tại (sẽ kích hoạt Webhook Hostinger nếu có):
```bash
git push
```
