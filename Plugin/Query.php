<?php
namespace Magiccart\SearchQuery\Plugin;


class Query extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magiccart\SearchQuery\Helper\Data $helper,
        array $data = []
    ) 
    {    
        parent::__construct($context, $data);
        $this->helper   = $helper;
    }

    public function aroundSaveIncrementalPopularity($subject, $callable)
    {
        return $subject;
    }

    public function aroundSaveNumResults($subject, $callable, $numResults)
    {
        $enabled = $this->helper->getConfigModule('general/enabled');
        $saveThis = true;
        if($enabled){
            $skip = $this->helper->getConfigModule('general/skip');
            $saveThis = (!$skip && $numResults);
            $query = $subject->getQueryText();
            if( preg_match('/\b((https?:\/\/)?(www\.)?[a-z0-9\-]+(\.[a-z0-9\-]+)+)\b|\b(bitcoin|coin|crypto|usdt|eth)\b/i', $query) ){
                $saveThis = false;
            }else{
                $query = str_split($query);
                foreach ($query as $char) {
                    if ( !(preg_match("/^[a-zA-Z0-9-+ ]/", $char)) ){
                        $saveThis = false;
                        break;
                    }
                }
            }
        }
        if($saveThis){
            $subject->getResource()->saveIncrementalPopularity($subject);
            $subject->setNumResults($numResults);
            $subject->getResource()->saveNumResults($subject);
        }

        return $subject;
    }
}
