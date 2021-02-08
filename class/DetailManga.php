<?php 



class DetailManga extends Manga{

        private $id;
        private $numero_du_tome;
        private $resume_du_tome;
        private $date_de_sortie;
        private $price;
        private $quantite_stock;
        private $id_item;
        private $ean;

    
        public function __toString(){
            return $this->getId(). " / ". $this->getNumero_du_tome() . " / ". $this->getResume_du_tome()."</br>";
        }


        /**
         * Get the value of ean
         */ 
        public function getEan()
        {
                return $this->ean;
        }

        /**
         * Set the value of ean
         *
         * @return  self
         */ 
        public function setEan($ean)
        {
                $this->ean = $ean;

                return $this;
        }

        /**
         * Get the value of id_item
         */ 
        public function getId_item()
        {
                return $this->id_item;
        }

        /**
         * Set the value of id_item
         *
         * @return  self
         */ 
        public function setId_item($id_item)
        {
                $this->id_item = $id_item;

                return $this;
        }

        /**
         * Get the value of quantite_stock
         */ 
        public function getQuantite_stock()
        {
                return $this->quantite_stock;
        }

        /**
         * Set the value of quantite_stock
         *
         * @return  self
         */ 
        public function setQuantite_stock($quantite_stock)
        {
                $this->quantite_stock = $quantite_stock;

                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of date_de_sortie
         */ 
        public function getDate_de_sortie()
        {
                return $this->date_de_sortie;
        }

        /**
         * Set the value of date_de_sortie
         *
         * @return  self
         */ 
        public function setDate_de_sortie($date_de_sortie)
        {
                $this->date_de_sortie = $date_de_sortie;

                return $this;
        }

        /**
         * Get the value of resume_du_tome
         */ 
        public function getResume_du_tome()
        {
                return $this->resume_du_tome;
        }

        /**
         * Set the value of resume_du_tome
         *
         * @return  self
         */ 
        public function setResume_du_tome($resume_du_tome)
        {
                $this->resume_du_tome = $resume_du_tome;

                return $this;
        }

        /**
         * Get the value of numero_du_tome
         */ 
        public function getNumero_du_tome()
        {
                return $this->numero_du_tome;
        }

        /**
         * Set the value of numero_du_tome
         *
         * @return  self
         */ 
        public function setNumero_du_tome($numero_du_tome)
        {
                $this->numero_du_tome = $numero_du_tome;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
}