<?php

namespace Blog\Controller;

use Blog\Repository\ArticleRepository;

class DefaultController extends AbstractController
{
    /**
     * @return string
     * @throws \Exception
     */
    public function home():string
    {
        // create new PDF document
        $pdf = new \Blog\Model\ExamplePDF();

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output(__DIR__.'/example_001.pdf', 'F');

        return $this->render('home.php',[
            'seo_title'=> PAGE_HOME,
            'articles'=> ArticleRepository::findAll()
        ]);
    }

    /**
     * @return string
     */
    public function contact():string
    {
        if(isset($_POST['field_contact_subject'], $_POST['field_contact_content'], $_POST['field_contact_type'])) {
            $sCleanSubject = strip_tags($_POST['field_contact_subject']);
            $sCleanContent = strip_tags($_POST['field_contact_content']);
            $sCleanType = strip_tags($_POST['field_contact_type']);
        }
        return $this->render('contact.php',[
            'seo_title'=>'Me contacter',
        ]);
    }
}