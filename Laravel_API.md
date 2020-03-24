# Laravel API

1)  **API là gì?**

API - Application Programming Interface, giao thức kết nối với các thư
viện và các ứng dụng khác. API cung cấp khả năng truy xuất đến một số
tập hàm hay dùng giúp trao đổi dữ liệu giữa các ứng dụng.

Một số loại API:

-   Web API: được sử dụng bởi các website

-   API trên Hệ điều hành: được sử dụng trên các hệ điều hành như
    Windows, Linux,\... giúp lập trình viên có thể lập trình các ứng
    dụng có thể tương tắc trực tiếp với hệ điều hành

-   API của thư viện phần mềm hay framework: được cung cấp bới các thư
    viện hay framework giúp một API sẽ có nhiều cách triển khai khác
    nhau và giúp một chương trình viết bằng ngôn ngữ này có thể gọi và
    sử dụng một hàm hay phương thức của một ngôn ngữ khác

2)  **Web API là gì?**

Web API là một phương thức dùng để cho phép các ứng dụng khác nhau có
thể giao tiếp, trao đổi dữ liệu qua lại. Dữ liệu được Web API trả lại
thường ở dạng JSON hoặc XML thông qua giao thức HTTP hoặc HTTPS.

Web API hỗ trợ restful đầy đủ các phương thức GET/POST/PUT/DELETE dữ
liệu giúp xây dựng các HTTP Service một các đơn giản và nhanh chóng.

Cách thức hoạt động của Web API:

-   Đầu tiên là xây dựng URL API để bên thứ ba có thể gửi request dữ
    liệu đến máy chủ cung cấp nội dung, dịch vụ thông qua giao thức HTTP
    hoặc HTTPS.

-   Tại web server cung cấp nội dung, các ứng dụng nguồn sẽ thực hiện
    kiểm tra xác thực nếu có và tìm đến tài nguyên thích hợp để tạo nội
    dung trả về kết quả.

-   Server trả về kết quả theo định dạng JSON hoặc XML thông qua giao
    thức HTTP/HTTPS.

-   Tại nơi yêu cầu ban đầu là ứng dụng web hoặc ứng dụng di động , dữ
    liệu JSON/XML sẽ được parse để lấy data. Sau khi có được data thì
    thực hiện tiếp các hoạt động như lưu dữ liệu xuống Cơ sở dữ liệu,
    hiển thị dữ liệu...

3)  **Restful API là gì?**

RESTful API là một tiêu chuẩn dùng trong việc thiết kế API cho các ứng
dụng web (thiết kế Web services) để tiện cho việc quản lý các resource.
Nó chú trọng vào tài nguyên hệ thống (tệp văn bản, ảnh, âm thanh, video,
hoặc dữ liệu động...), bao gồm các trạng thái tài nguyên được định dạng
và được truyền tải qua HTTP.

Một số phương thức restful:

-   GET: trả về một resource hay một danh sách resource

-   POST: tạo mới một resource

-   PUT: cập nhật thông tin cho resource

-   DELETE: xóa một resource

Những phương thức hay hoạt động này thường được gọi là CRUD tương ứng
với Create, Read, Update, Delete -- Tạo, Đọc, Sửa, Xóa.

4)  **Tìm hiều và xây dựng API trong Laravel**

    a.  **Xây dựng URL API**
    
    Thực hiện cấu hình url trong laravel bằng cách chỉnh sửa trong các file của thư mục routes. Trong thư mục này có chứa các file như:

-   web.php - url thông thường

-   api.php - url dành cho api, url được tự động thêm tiền tố api để
    phân biệt (có thể chỉnh sửa tiền tố nếu muốn)

-   \...

    Ta thực hiện cấu hình url cho api trong file api.php, laravel hỗ trợ cấu hình cho đầy đủ các phương thức restful. Cú pháp như sau:

> Route::ten\_phuong\_thuc('url/{param\_1}/{param\_2}/\...', 'Ten\_Controller\@Ten\_method')

    
   Trong đó có chứa Controller và phương thức của nó sẽ được gọi khi người dùng request đến url này. Các param nếu có sẽ được tự động truyền vào như là một đối số của phương thức đó.

   b.  **Xây dựng các controller để xử lý**

   Như trong cú pháp cấu hình url có chứa controller và phương thức, ta xây dựng các Controller và các phương thức tương tự. Các controller có thể xây dựng trước sau đó cấu hình url cũng được.

   Để tạo Controller trong Laravel, người dùng có thể dùng lệnh
> php artisan make:controller ten\_controller

   Sau khi tạo controller xong, tiến hành xây dựng các phương thức tương ứng đã gọi trong route. Lưu ý, các phương thức này phải có đối số mặc định là Request \$request. Ngoài ra, tùy vào route có param hay không mà khai báo các phương thức theo cho đúng.

   Quá trình xử lý của các phương thức xong, thông thường api sẽ trả về dữ liệu dạng json. Người dùng có thể trả về bằng phương thức

> response()-\>json(data\_array).
