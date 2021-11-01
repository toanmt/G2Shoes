<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Giày Converse Taylor All Star Classic - Red',
            'price' => '900000',
            'discount' => '5',
            'amount' => '500',
            'description' => 'Giày Converse Classic là dòng bán chạy số 1 của Converse, là dòng giày truyền thống của Converse được giữ đúng nguyên với bản ban đầu.  Mẫu giày biểu tượng hơn 100 năm & bán chạy nhất mọi thời đại của.\r\nClassic Red cao cổ mang lại cảm giác năng động, trẻ trung và nổi bật.',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Converse Taylor All Star Classic - Cream White',
            'price' => '896000',
            'discount' => '8',
            'amount' => '400',
            'description' => 'Những đôi giày Converse Classic cổ thấp vừa nhẹ nhàng, vừa đơn giản phù hợp với những ngày hè rực lửa. Logo All Star quen thuộc của hãng được in 3D ở vị trí gót giày và lưỡi gà như một dấu ấn thương hiệu, không quá khoa trương như những đôi giày khác của Converse với logo được khâu ngoài mắt cá chân.',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Converse Taylor All Star Classic - Black/White',
            'price' => '780000',
            'discount' => '5',
            'amount' => '500',
            'description' => 'Classic là dòng bán chạy số 1 của Converse. Với 6 sắc màu cơ bản thì đen trắng là màu dễ phối được nhiều bạn tin chọn. Đôi giày mà ai cũng nên có vì độ bền, độ đẹp và siêu dễ phối đồ, hợp với tất cả thể loại trang phục.',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Converse Taylor All Star Seasonal Color',
            'price' => '980000',
            'discount' => '4',
            'amount' => '100',
            'description' => 'Nhắc đến tên dòng sản phẩm này - giày Converse classic đã đủ để thấy được sự basic của nó. Và BST Chuck Taylor All Star Classic đã chứng tỏ được vị thế của những đôi giày chất lượng - đơn giản - giá cả phải chăng của mình khi nó lọt top những sản phẩm đáng sở hữu nhất mà ai cũng nên có một đôi.',
            'type_id' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Vans Old Skool Pig Suede',
            'price' => '976000',
            'discount' => '4',
            'amount' => '600',
            'description' => 'Phiên bản Vans Old Skool Pig Suede vẫn xuất hiện họa tiết lượn sóng “sidestripe V” đặc trưng, mang ý nghĩa biểu tượng của nhà Vans và được làm nổi bật với tông màu trắng hoặc ở phiên bản xanh rêu sọc jazz này sẽ cùng tông màu với thân giày',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Vans Old Skool Navy White',
            'price' => '800000',
            'discount' => '5',
            'amount' => '700',
            'description' => 'Oldskool xanh navy là 1 trong các sản phẩm bán chạy, không thể thiếu của tín đồ Vans. Với chất liệu da lộn mài mix vải, cùng với phối màu đen - xanh navy: màu sắc của đồng phục, cực kì basic. Rất hợp để mang đến trường, cùng bạn qua những ngày thanh xuân vườn trường. Hay kết hợp với tee, chân váy bò siêu năng động.',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Vans Old Skool I Heart Vans',
            'price' => '900000',
            'discount' => '5',
            'amount' => '400',
            'description' => 'Kiểu dáng Old Skool quen thuộc kết hợp thiết kế trẻ trung, năng động cùng họa tiết I HEART MY VANS lạ mắt nổi lên 2 bên thân giày, mang đến sự đặc biệt cho sản phẩm. Ngoài ra, đường viền xung quanh đế giày được thay bằng màu xanh đồng bộ với họa tiết chữ.',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Vans Old Skool All White',
            'price' => '800000',
            'discount' => '10',
            'amount' => '500',
            'description' => 'Oldskool trắng là một trong những sản phẩm bán chạy, chất lượng nhất của Vans. Với chất liệu vải canvas dễ giặt, cùng với phối màu trắng siêu dễ phối dù là vest lịch lãm, váy bánh bèo hay sexy cho đến những bộ đồng phục nghiêm túc, ... đều giúp bạn nổi bật hơn hết.',
            'type_id' => '2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Adidas Nam Adidas Stansmith Green',
            'price' => '760000',
            'discount' => '6',
            'amount' => '300',
            'description' => 'The Stan Smith là dòng sản phẩm giày quần vợt cổ điển, lần đầu tiên xuất hiện vào năm 1971 và đã trở thành một biểu tượng thời trang và nhìn thấy từ sân tennis đến văn phòng trên toàn thế giới. Lớp lót bằng da, với sockliner OrthoLite® mang lại cho giày một cái nhìn cao cấp, gót chân được giữ trong da lộn cho một cái nhìn cổ điển và 3-sọc đục lỗ mang tính biểu tượng tự hào ở hai bên.',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Adidas Nam Adidas Senseboost Go Winter',
            'price' => '940000',
            'discount' => '10',
            'amount' => '600',
            'description' => 'Được thiết kế cho cảnh quan đô thị, những đôi giày chạy này có phần đế đan nhẹ,thích ứng theo chuyển động tự nhiên của sải chân của bạn. Nền tảng rộng cung cấp năng lượng và hỗ trợ cho chuyển động, midsole đáp ứng trả lại năng lượng cho mỗi bước chạy. Cam kết hàng chính hãng 100% bao check bao test.',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Adidas Nam Adidas Ultraboost 20',
            'price' => '780000',
            'discount' => '10',
            'amount' => '900',
            'description' => 'Mỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi.',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Giày Adidas Nam Adidas Harden Vol 4.0',
            'price' => '900000',
            'discount' => '5',
            'amount' => '500',
            'description' => 'Với những chi tiết lấy cảm hứng từ những người bạn thời thơ ấu của mình, đôi giày bóng rổ này kỷ niệm mối quan hệ giữa James Harden và các đồng đội ở trường trung học. Được xây dựng với cấu trúc giống như vớ, chúng có đệm giữa linh hoạt để tăng sự thoải mái.',
            'type_id' => '3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 Low Unlocked',
            'price' => '980000',
            'discount' => '0',
            'amount' => '100',
            'description' => 'Vào năm 1971, huyền thoại Swoosh ra đời lấy cảm hứng từ nữ thần Hy Lạp Nike. Hãy tôn vinh biểu tượng này theo cách của bạn với đôi giày vĩ đại nhất mọi thời đại của chúng tôi: Nike Air Force 1 Unlocked. ',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 07 Premium',
            'price' => '790000',
            'discount' => '3',
            'amount' => '200',
            'description' => 'Điểm khác biệt: Biểu tượng Swoosh và gót giày được chế tác từ nguyên liệu thực vật có kết cấu phong phú lấy từ sợi lá dứa, bởi vì: Thông thường không bao giờ làm nên huyền thoại. ',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 Shadow',
            'price' => '900000',
            'discount' => '0',
            'amount' => '300',
            'description' => 'Nâng tầm phong cách của bạn. Da màu vàng, cao su tổng hợp, da lộn và da in họa tiết houndstooth kết hợp với nhau để tạo nên nét độc đáo và đa chiều trên AF-1 Shadow. ',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('products')->insert([
            'product_name' => 'Nike Air Force 1 GORE-TEX ®',
            'price' => '999000',
            'discount' => '0',
            'amount' => '150',
            'description' => 'Sự rạng rỡ còn tồn tại trong Nike Air Force 1 GORE-TEX, loại bóng b-ball OG mang đến sự tươi mới cho những gì bạn biết rõ nhất: da sắc nét, màu sắc đậm và lượng đèn flash hoàn hảo để bạn tỏa sáng. Lần này, trong công nghệ GORE-TEX. ',
            'type_id' => '4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
