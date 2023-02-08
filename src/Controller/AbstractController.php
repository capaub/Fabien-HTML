<?php

namespace Blog\Controller;

abstract class AbstractController
{
    /**
     * @param string $sUrl
     * @return void
     */
    protected function redirectAndDie(string $sUrl): void
    {
        header('Location: ' . $sUrl);
        die;
    }

    /**
     * @param string $sView
     * @param array $aParams
     * @return string
     */
    protected function render(string $sView, array $aParams = []): string
    {
        extract($aParams, EXTR_OVERWRITE);
        ob_start();
        include __DIR__ . '/../../views/base.php';
        return ob_get_clean();
    }
}