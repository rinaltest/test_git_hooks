<?php
    class Gift extends AppModel
    {
        public function getGifts($page=0, $limit=30)
        {
            $listGifts = $this->query("SELECT gifts.*, users.id, user_name, profile FROM gifts INNER JOIN users ON gifts.user_id = users.id ORDER BY gift_date DESC LIMIT ".($page*$limit).",".$limit);
            return $listGifts;
        }
    }
?>