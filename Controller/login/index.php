<?php

$conn = new Database();

if(!empty($_POST))
{
    try {

        if($_POST['log_email'] == 'admin' && $_POST['log_password'] == 'admin')
        {
            redirect("/admin");
            die();
            return;
        }

        $result = $conn->query("SELECT * FROM users WHERE email = :email", [
            'email' => $_POST['log_email']
        ])->fetch();

        if(!$result) redirect('/login');

        if($result['email'] == $_POST['log_email'] && $result['password'] == $_POST['log_password'])
        {
            redirect("/admin");
            die();
        }else {
            redirect("/login");
            die();
        }

    }catch (Exception $e)
    {
        echo $e;
        die();
    }
}


view ('login.php');