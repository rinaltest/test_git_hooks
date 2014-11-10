<?php
    class GiftsController extends AppController
    {
        public $uses = array("Gift");
        public $components = array('RequestHandler');
        public function index()
        {
            $page = $this->request->query['page'];
            $limit = $this->request->query['limit'];
            $data = $this->Gift->getGifts($page,$limit);
            for( $i = 0; $i < count($data); $i++ )
            {
                $data[$i]['gifts']['gift_img_name'] =  "../images/gift_images/".$data[$i]['gifts']['gift_img_name'];
                $data[$i]['users']['profile'] = "../images/profile/".$data[$i]['users']['profile'];
            }
            $this->set(array(
                'gifts' => $data,
                '_serialize' => array('gifts')
            ));
        }
    }