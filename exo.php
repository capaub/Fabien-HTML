<?php
//création d'un dictionnaire associant une fonction à une url

$aRouting = [
    // fonction statique au sein d'une classe
    '/contact' => 'ContacController::index',
];

function homeAction()
{
    echo '/homeAction';
}

abstract class AbstractController
{
    /**
     * @param string $sView
     * @param array $aParams
     * @return string
     */
    protected function render(string $sView, array $aParams): string
    {
        extract($aParams, EXTR_OVERWRITE);

        ob_start();

        include 'template.php';

        return ob_get_clean();
    }
}

class ContacController extends AbstractController
{
    /**
     * @return string
     */
    public function index(): string
    {
        $aUsers = ['user1', 'user2'];

        return $this->render('view.php', [
            'title' => 'Blog',
            'h1' => 'Salut',
            'users' => $aUsers,
        ]);
    }


}


[$sClass, $sFunction] = explode('::', $aRouting['/contact']);
echo (new $sClass())->$sFunction();
