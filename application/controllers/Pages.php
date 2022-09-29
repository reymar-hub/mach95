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
        $user = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'type_of_service' => $this->input->post('type_of_service'),
            'message' => $this->input->post('message')
        );
    }
}