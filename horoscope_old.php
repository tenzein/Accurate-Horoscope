<?php
    include('simple_html_dom.php');

   $page = 1;
    if(!empty($_GET['page'])) {
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        if(false === $page) {
            $page = 1;
        }
    }
   
    $url = "https://www.horoscope.com/us/horoscopes/general/horoscope-general-daily-today.aspx?sign=".$page;


    $html = file_get_html($url);
   
    $data = returndata($html);
    $ratings=returnsdata($html);
    
    $result= [
        'matches'=>array("love"=>$data[0],
                    "friendship"=>$data[1],
                    "career"=>$data[2]),
                    "ratings"=>$ratings,
                    "lucky_number"=>luckyNumber($page)
                    ];
    
    
    echo json_encode($result);


    
    function returndata($html)
    {    $data = array();

         foreach($html->find('div[class=inner flex-center-inline] a p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
    
    function returnsdata($html)
    {
        $rating = array();
        $i=0;
        $j=0;
        foreach($html->find('div[class=ratings flex-center-inline] a') as $element)
          { 
        
            foreach ($element->getElementsByTagName('i') as $p) {
                            

                 if (strtolower(trim($p->getAttribute('class'))) == 'icon-star-filled highlight') {
                        ++$i;
                    }
                
            }
            if($j==0)
                $rating['sex'] =$i;
            elseif($j==1)
                $rating['hustle'] =$i;
            elseif($j==2)
                $rating['vibe'] =$i;
            elseif($j==3)
                $rating['success'] =$i;
                
            
            $j++;    
            $i=0;
           
        
        }   
      return $rating;
    }
    
    function luckyNumber($index){
        $number;
        
        switch($index)
        {
            case 1:
                $number ="5, 8, 16, 24, 37, 43, 51";
                return $number;
            case 2:
                $number ="5, 8, 10, 11, 23, 34, 45";
                        return $number;    
            case 3:
                $number ="6, 9, 11, 19, 25, 35, 60";
                                        return $number;    

            case 4:
                $number ="8, 10, 21, 28, 29, 47, 48";
                                        return $number;    

            case 5:
                $number ="2, 3, 4, 17, 18, 37, 44";
                return $number; 
            case 6:
                $number ="4, 9, 16, 17, 22, 38, 41";
                return $number; 
            case 7:
                $number ="6, 7, 26, 30, 35, 38, 53";
                return $number; 
            case 8:
                $number ="4, 8, 10, 17, 19, 41, 49";
                return $number; 
            case 9:
                $number ="1, 5, 8, 22, 29, 33, 44";
                return $number; 
            case 10:
                $number ="7, 10, 18, 21, 24, 36, 59";
                return $number; 
            case 11:
                $number ="6, 7, 13, 16, 27, 34, 47";
                return $number; 
            case 12:
                $number ="3, 8, 17, 17, 33, 38, 44";
                return $number;    
            default:
                    break;
                
        }
    }
    
?>