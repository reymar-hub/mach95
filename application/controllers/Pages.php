<?php
class Pages extends CI_Controller
{

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
    public function user_post()
    {
        if ($this->input->post('submit')) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['type_of_service'] = $this->input->post('type_of_service');
            $data['message'] = $this->input->post('message');
            $response = $this->User_model->user_post($data);

            if ($response == true) {
                echo '<script>alert("Submitted Successfully")</script>';
                $this->send_mail($data['name'], $data['email'], $data['type_of_service'], $data['message']);
                $this->view('home');
            } else {
                echo "Failed Submitting!";
            }
        }
    }
    public function send_mail($name, $email, $type_of_service, $message)
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object

        $mail = $this->phpmailer_lib->load();
        $mail->IsSMTP(); /* we are going to use SMTP */
        $mail->SMTPAuth   = true; /* enabled SMTP authentication */
        $mail->SMTPSecure = "ssl";  /* prefix for secure protocol to connect to the server */
        $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
        $mail->Port       = 465;
        // $mail->SMTPDebug  =  2;               /* SMTP port to connect to GMail */
        $mail->AddCC($email);
        $mail->Username   = "arcenalreymar08@gmail.com";  /* user email address */
        $mail->Password   = "rqwxtjurqnphnyfm";            /* password in GMail */
        $mail->SetFrom('arcenalreymar08@gmail.com', 'MACH95');  /* Who is sending */
        $mail->isHTML(true);
        $mail->Subject    = $type_of_service;
        $mail->Body      = '
            <html>
            <body>
            <h3>' . $type_of_service . '</h3>
            <p> Name:' . $name . '</p>
            <p> Message:' . $message . '</p><br>
            <p>With Regards</p>
            <p>MACH95 TEAM</p>
            </body>
            </html>
        ';
        $destination = "reylynn.arcenal@gmail.com"; // Mach95 email
        $mail->AddAddress($destination, $name);
        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }
}