<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 10:14 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';

require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';

//từ khóa use dùng tương tự như require_once
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaymentController extends Controller
{
    public function index(){
        if(isset($_POST['submit'])){

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            if(empty($first_name) || empty($address) || empty($phone)){
                $this->error = "Tên, địa chỉ và số điện thoại không được để trống";
            }
            if(empty($this->error)){
//                echo "<pre>";
//                print_r($_POST);
//                print_r($_SESSION);
//                echo "</pre>";
                $order_model = new Order();
                $order_model->first_name = $first_name;
                $order_model->last_name = $last_name;
                $order_model->address = $address;
                $order_model->email = $email;
                $order_model->phone = $phone;
                $order_model->note = $note;
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart){
                    $price_item = $cart['price'] * $cart['quantity'];
                    $price_total += $price_item;
                }
                $order_model->price_total = $price_total;
                $order_model->payment_status = 0;
                $order_id = $order_model->insert();
                if($order_id > 0){
                    $order_detail_model = new OrderDetail();
                    $order_detail_model->order_id = $order_id;
                    foreach ($_SESSION['cart'] as $product_id => $cart) {
                        $order_detail_model->product_id = $product_id;
                        $order_detail_model->quantity = $cart['quantity'];
                        $is_insert = $order_detail_model->insert();
//                        var_dump($is_insert);
//                        die();
                    }
                    if($method == 0){

                    }else{
                        $this->sendMail($email);
                        unset($_SESSION['cart']);
                        header("Location: index.php?controller=payment&action=thank");
                        exit();
                    }
                }
            }
        }
        $this->content = $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }

    public function sendMail($email){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //thêm dòng sau để hiển thị đc ký tự có dấu
            $mail->CharSet = 'UTF-8';
            //thực tế sẽ sử dụng DEBUG_OFF để bỏ việc debug gửi mail
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            //sử dụng server gmail để gửi mail
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            //nhập tài khoản gmail cho username
            //tạm thời dùng tài khoản sau để
            // đỡ mất thời gian Xác minh 2 bươc
            $mail->Username = 'cauolacuato2121@gmail.com';                     // SMTP username
            //password ko phải là pasword gmail, mà gmail có 1 cơ chế
            //tạo password cho các ứng dụng, password này độc lập với
            //password gmail của bạn
            $mail->Password = 'lblnnrukeiwhwmvp';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            //gửi từ ai
            $mail->setFrom('abc@gmail.com', 'Ogani Shop Website');
            //gửi tới ai
            $mail->addAddress($email);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiêu đề gửi mail';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function thank(){
        $this->content = $this->render('views/payments/thanks.php');
        require_once 'views/layouts/main.php';
    }
}