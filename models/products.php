<?php

    class products extends model
    {
        //listar produtos
        public function getList()
        {
            $array = array();
            $sql = "select *,
            (select brands.name from brands where brands.id = products.id_brand) as brand_name,
            (select categories.name from categories where categories.id = products.id_category) as category_name
            
            from products";
            $sql = $this->db->query($sql);
            
            if($sql->rowCount() > 0)
            {
                $array = $sql->fetchAll();
                
                //imgs
                foreach ($array as $key => $item)
                {
                    $array[$key]['images'] = $this->getImagesByProductId($item['id']);
                }
            }
            return $array;
        }
        
        //method
        public function getImagesByProductId($id)
        {
            $array = array();
            
            $sql = "select url from products_images where id_product = :id";
            $sql = $this->db->prepare($sql);
            
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            //verify
            if($sql->rowCount() > 0)
            {
                $array = $sql->fetchAll();
            }
            
            return $array;
        }
        
    }

?>
