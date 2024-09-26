<?php

require_once APP_ROOT . '/app/services/ArticleService.php';

class ArticleController
{
    public function add()
    {
        include_once APP_ROOT . '/app/views/articles/add.php';
    }
    public function store()
    {
        $ten_tloai = $_POST['ten_tloai'];
        $article = new Article(null, $ten_tloai);

        $articleService = new ArticleService();
        $articleService->addArticle($article);

        header('Location: ?controller=home');
    }
    // public function edit($id)
    // {
    //     if (isset($id)) {
    //         $patientService = new PatientService();
    //         $patient = $patientService->getPatientById($id);

    //         include APP_ROOT . '/app/views/patient/edit.php';
    //     } else {
    //         echo 'Id is null';
    //     }
    // }
    // public function update($id)
    // {
    //     $name = $_POST['name'];
    //     $gender = $_POST['gender'];
 
    //     $patient_new = new Patient($id, $name, $gender);
    //     $patientService = new PatientService();
    //     $patientService->updatePatient($patient_new);
    //     header('Location: ?controller=home');
    // }
    // public function destroy($id)
    // {
    //     $patientService = new PatientService();
    //     $patient = $patientService->getPatientById($id);

    //     include APP_ROOT . '/app/views/patient/delete.php';
    // }
    // public function delete($id)
    // {
    //     $patientService = new PatientService();
    //     $patientService->deletePatient($id);
    //     header('Location: ?controller=home');
    // }
}