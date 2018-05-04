<?php

namespace Slack\GoSDL\Libraries;

use Smarty as SmartyClass;

class Smarty {
    private $Smarty;

    public function __construct()
    {
        $this->Smarty = new SmartyClass();
        $this->Smarty->setTemplateDir('../www/templates');
        $this->Smarty->setCompileDir('../www/templates_c');
        $this->Smarty->setCompileCheck(true);
        $this->Smarty->setForceCompile(true);
        $this->Smarty->assign('versions', time());
        $this->detectTrello();
    }

    private function detectTrello()
    {
        if(strtolower(getenv('TRELLO')) === 'true') {
            $this->Smarty->assign('trello_api_key', getenv('TRELLO_API_KEY'));
            $this->Smarty->assign( 'trello', 'true' );
            return;
        }

        $this->Smarty->assign( 'trello', 'false' );
    }

    /**
     * @return SmartyClass
     */
    public function getSmarty()
    {
        return $this->Smarty;
    }
}
