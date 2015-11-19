<?php 

class Model_Region extends  Model {
    
    public function getParentRegionNameByRegions($regions) {
        if(isset($regions[$this->parent])) {
            return $regions[$this->parent]['name'];
        }
        
        return '';
      
    }
    
    public function getPositionCountByRegionCounts($regionCounts) {
//         var_dump($regionCounts);
        if(isset($regionCounts[$this->region_id])) {
            return $regionCounts[$this->region_id]['count'];
        }
        return 0;
    }
}