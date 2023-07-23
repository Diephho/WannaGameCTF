# Head1 (Web)

* `index.php`:
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/5f8656dc-5d4e-4c11-9531-09961fd7a44c)
* Đọc qua có thể thấy cần phải gửi lên server dữ liệu cho `input_data`, sau đó server sẽ lấy đó thực hiện câu lệnh `curl --head ` với dữ liệu đã gửi. Nhưng lại chặn url có kí tự "_".
* Do đó ta phải dùng curl để POST thẳng lên server, đồng thời sử dụng `%5F` thay cho "_" để không bị server chặn lại
* Ngoài ra, trong dockerfile ta nhận được `RUN mv /flag.txt /flag_$(openssl rand -hex 10)`, file flag.txt đã được chuyển sang file flag với 10 hex nên cần biết tên file trước. Do đó, ta sử dụng kèm lệnh ls để kiểm tra các file.
* payload: `curl -d input_data=%3Bls%20%2F http://45.122.249.68:20018/?input%5fdata=`
* ![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/62be9d40-c3cb-4762-8351-e81bac1b5b23)
* Ta đã nhận tìm được file `flag_0d7049824be12ca9d7da`
* Sau đó tiếp tục dùng curl gửi lên lệnh cat file chứa flag vừa tìm được.
* payload: ` curl -d input_data=%3Bcat%20%2Fflag_0d7049824be12ca9d7da http://45.122.249.68:20018/?input%5fdata=`
* ![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/f05bf0e1-8325-4452-ba18-f88535b11e2c)
