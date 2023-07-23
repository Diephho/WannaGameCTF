# Dimension (Forensics)

* Challenge cho ta 1 file ảnh final.png nhưng không thể mở ra ảnh nên trước tiên kiểm tra lại file type thì nhận được *final.png: PNG image data, 0 x 0, 8-bit/color RGB, non-interlaced*.
* Dùng xxd để kiểm tra file
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/a26766ea-3618-4242-b0ac-1b087bacbc06)
* Sau khi tìm kiếm trên mạng thì đây là IDHR chunk:
- `89 50 4e 47 0d 0a 1a 0a` : _file signature_, filetype là png
- `00 00 00 0d` : IHDR length
- `49 48 44 52` : chunk type, ở đây là IHDR
- `00 00 00 00` : chiều dài
- `00 00 00 00` : chiều rộng
- `08 02 00 00 00` : các thông số khác
- `87 49 16 5a` : crc checksum, *quan trọng*
* File đang ở dạng 0x0, tên chall là Dimension nên nghĩ đến việc thay đổi kích thước của file ảnh để xem được file, cần thay đổi các hex chiều dài rộng
* Sử dụng bruteforce dimension bằng crc32 cho đến khi nhận được crc đúng, với chiều dài và rộng đều là 4 bytes.
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/e8ded0bc-6d50-4eff-a5ff-c385eb2a137e)
Sau khi chạy chương trình kết quả nhận được
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/a35e70e8-fdfe-4d33-81ef-fdf585b7a9f8)
* Sau khi đã có hex của length và width, dùng tool HxD (Hexeditor) để thay cho đúng, và nhận được ảnh chứa flag
* hex dài: `00 00 04 80`
* hex rộng: `00 00 02 88`
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/27c08e1a-a8bf-4085-917d-130f44fc5a68)
![image](https://github.com/Diephho/miniCTF-W1/assets/126962960/0c8ee401-c234-411c-a667-64c3307e5951)



