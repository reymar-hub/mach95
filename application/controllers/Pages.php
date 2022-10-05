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
                $this->view('home');
            } else {
                echo "Failed Submitting!";
            }
        }
    }
}