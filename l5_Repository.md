# l5 Repository

1)  **Tìm hiểu l5-repository**

    a.  **Repository pattern là gì?**

-   Repository pattern là lớp trung gian giữa tầng Business Logic và Data Access giúp cho việc truy cập dữ liệu bảo mật và chặt chẽ hơn

-   Repository đóng vai trò là lớp kết nối giữa tầng Business và tầng Model

    b.  **l5-repository là gì?**

-   l5-repository là một packet giúp tạo và thao tác với repository một cách hiệu quả hơn

2)  **Triển khai gói l5-repository**

    a.  **Cài đặt gói:** dành cho Laravel phiên bản từ 5.5 trở lên

-   Mở project muốn cài đặt, chạy lệnh 
> composer require prettus/l5-repository trên terminal

-   Sau đó, mở file config/app.php thêm vào providers
> Prettus\\Repository\\Providers\\RepositoryServiceProvider::class

    a.  **Triển khai gói**

-   Tạo các model nếu cần bằng lệnh php artisan make:model ten-model

-   Thêm property protected table cho model, thuộc tính này quy định tên của bảng mà model trỏ tới

-   Thêm property public timestamps cho entity (window), cho model (linux), thuộc tính này quy định có kèm theo thời gian chỉnh sửa dữ liệu trong lúc thao tác với bảng mà model đó trỏ tới hay không

-   Tạo các repository cho các model bằng lệnh 
> php artisan make:repository ten-model

-   Binding interface với repository bằng lệnh 
> php artisan make:bindings ten-model

-   Tạo entity cho các model vừa tạo bằng lệnh 
> php artisan make:entity ten-model

-   Thêm property fillable cho entity (window) và cho model (linux), thuộc tính này là một mảng các cột quy định danh sách các cột có thể truy xuất tới bảng đó.

-   Thêm vào file _app\\Providers\\AppServiceProvider.php_, phương thức _boot_ dòng
> \$this-\>app-\>register(RepositoryServiceProvider::class);

-   Tạo các controller tương ứng cho các model vừa tạo, thêm phương thức _constructor_

```
public function __construct(NameRepository \$repository)
{
    $this->repository = $repository;
}
```

   b.  **Một số phương thức**

-   Đọc tất cả record trong bảng: \$this-\>repository-\>all();

-   Tìm kiếm record theo id: \$this-\>repository-\>find(\$id);

-   Tìm kiếm record theo một cột bất kỳ:
> \$this-\>repository-\>findByField('column-name', value);

-   Thêm một dòng mới: 
> \$this-\>repository-\>create(\[\...\]);

-   Cập nhật một dòng: 
> \$this-\>repository-\>update(\[\...\], \$id );

-   Xóa một dòng: 
> \$this-\>repository-\>delete( \$id );

   c.  **Tìm hiểu Criteria**

Trong quá trình đọc hoặc tìm kiếm các record trong bảng, tuy packet này đã cung cấp các method để hỗ trợ. Tuy nhiên, một số truy vấn sẽ có điều kiện khá phức tạp khó để áp dụng được các phương thức sẵn có.

Criteria sẽ hỗ trợ thêm người dùng thực hiện các truy vấn phức tạp bằng việc tự động áp dụng một số điều kiện nhất định khi truy vấn mà chúng ta đã định nghĩa trong quá lúc chúng ta truy vấn.

Criteria hỗ trợ chúng ta có thể áp dụng một hay nhiều điều kiện thêm nếu cần thiết.

-   Chạy lệnh để tạo một criteria
> php artisan make:criteria ten-criteria

-   Mặc định, mỗi criteria được tạo sẽ có một phương thức apply, chúng ta sẽ thêm điều kiện vào trong phương thức này

-   Để áp dụng criteria cho repository, ta dùng phương thức _pushCriteria(\$criteria)_. Và ngược lại ta dùng phương thức _popCriteria(\$criteria)_

-   Sau khi áp dụng criteria, nếu như trong một số lúc truy vấn ta không muốn áp dụng điều kiện trong criteria, ta dùng phương thức
> \$this-\>repository-\>skipCriteria()-\>\...

-   Để mặc định áp dụng criteria cho repository, ta có thể thực hiện bằng cách chèn lệnh sau vào phương thức boot của repository đó
> \$this-\>repository-\>pushCriteria()
