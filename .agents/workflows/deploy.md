---
description: Tự động deploy code website lên Hostinger qua GitHub Webhook
---

// turbo-all

1. Thêm tất cả các file có sự thay đổi vào Git
```bash
git add .
```

2. Commit các thay đổi
```bash
git commit -m "Auto deploy - Cập nhật giao diện / tính năng mới"
```

3. Đẩy (push) code mới nhất lên GitHub (Hostinger sẽ tự động kéo code về sau vài giây)
```bash
git push origin main
```
