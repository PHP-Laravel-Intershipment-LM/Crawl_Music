1.  **Tìm hiểu Cache**

    a.  **Cache trong lập trình web là gì?**

Cache là tên gọi của bộ nhớ đệm -- nơi lưu trữ các dữ liệu nằm chờ các ứng dụng hay phần cứng xử lý. Mục đích của nó là để tăng tốc độ xử lý (có sẵn xài liền không cần tốn thời gian đi lùng sục tìm kéo về).

Trong lập trình website, cache giúp website cải thiện một số mặt như:

-   Cải thiện tốc độ, phản hồi các yêu cầu gần như tức thời.

-   Giảm thiểu băng thông

-   Tăng hiệu suất phần cứng, giảm thiểu hoạt động cho CPU

-   Đáp ứng được khi lưu lượng truy cập lớn

Cache thường được lưu trữ ở nhiều nơi khác nhau, có thể trên server hay lưu ngay tại máy client hoặc ở một webserver khác.

Các phương thức cache:

-   HTML Caching: là hình thức một trang web động mà người dùng đã tải
    sẽ được xử lý thành một trang web tĩnh và lưu ở server để cấu hình
    tái sử dụng cho các lần khác. Phương thức này khá hiệu quả cho các
    website có nhiều hình ảnh, các file js, css

-   Opcode Caching: đối với các ngôn ngữ lập trình kịch bản như php, tốc
    độ sẽ không nhanh như các mã nguồn khác. Do đó, Code sau khi đã được
    biên dịch sẽ lưu tại đĩa cứng hoặc Ram để tái sử dụng. Opcode giúp
    tối ưu tốc độ website, tăng tốc xử lý truy vấn PHP.

-   Object Caching: hình thức này chỉ hỗ trợ riêng trong WordPress,
    thông qua hàm wp\_cache. Áp dụng lưu trữ cho các đối tượng query,
    session hoặc bất cứ thứ gì được xử lý bằng code PHP.

-   Database Caching: lưu trữ lại kết quả của các truy vấn phổ biến tới
    database đến bộ nhớ RAM. Nếu có người truy vấn lại tới những dữ liệu
    trên, chúng sẽ được trả lại ngay cho người dùng mà không cần phải
    truy vấn database lần nữa.

    b.  **Caching data trong Laravel**

Người dùng có thể cấu hình cache ở file config/cache.php

Trong file này, người dùng có thể cấu hình driver cache mà họ muốn. Laravel hỗ trợ một số driver cache như file, database hay 2 nền tảng caching phổ biến đó là memcached và redis

Sau khi cấu hình hoàn tất, tiến hành caching data mà người dùng muốn

Để có thể sử dụng các phương thức cache, người dùng phải chèn vào code lệnh này
> use Illuminate\\Support\\Facades\\Cache;

Một số phương thức cache:

_Cache::get('ten\_key', 'defaul\_value')_: đọc value của key được lưu trong cache, nếu key không tồn tại sẽ trả về giá trị default\_value mặc định là null)

_Cache::pull('ten\_key')_: đọc value của key và xóa đi, trả về null nếu key không tồn tại

_Cache::has('ten\_key')_: kiểm tra key có tồn tại trong cache chưa

_Cache::add('ten\_key', 'value', 'time')_: lưu một giá trị mới vào cache, giá trị time quy định số giây mà giá trị được lưu

_Cache::put('ten\_key', 'value', 'time')_: cập nhật giá trị item có key trong cache

_Cache::forever('ten\_key', 'value')_: lưu mãi mãi dữ liệu vào cache

_Cache::forget('ten\_key')_: xóa item có key trong cache

_Cache::flush()_: xóa toàn bộ cache