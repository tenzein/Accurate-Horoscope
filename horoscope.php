<?php
    include('simple_html_dom.php');

    
    if( $_POST["type"] || $_POST["sign"] ) {
        
        $type = $_POST["type"];
        $sign = $_POST["sign"];
        
  }
  if($type!="" && $sign!="")
  {
      $url= "";
      if($type=="daily"){
                $url = "https://www.astrology.com/horoscope/".$type."/".$sign.".html";
      }else
      {
                $url = "https://www.astrology.com/horoscope/daily/".$type."/".$sign.".html";

      }
      
      
     $html = file_get_html($url);
     $date = returnDate($html);
    $result= [
        'data'=>array(
            "date"=> strip_tags($date),
            "overview"=>strip_tags(returnDaily($html)),
            "love"=>strip_tags(returnLove($html)),
            "work"=>strip_tags(returnWork($html)),
            "dating"=>strip_tags(returnDating($html)),
            "bonus"=>strip_tags(returnBonus($html))
                )    ];
    
    
    echo json_encode($result);

  }else
     echo "Invalid Token";
   
      function returnDate($html)
    {   
         foreach($html->find('span[id=content-date]') as $element)
          { 
             return $element->innertext;
              
          }
    }
   
    
    function returnDaily($html)
    {   
         foreach($html->find('div[id=content] p') as $element)
          { 
             return $element->innertext;
              
          }
    }
   
     function returnLove($html)
    {   

         foreach($html->find('div[id=content-love] p') as $element)
          { 
             return $element->innertext;
              
          }
    }
   
     function returnWork($html)
    {   
        foreach($html->find('div[id=content-work] p') as $element)
          { 
             return $element->innertext;
              
          }
    }
   
     function returnDating($html)
    {  
         foreach($html->find('div[id=content-dating]') as $element)
          { 
             return $element->innertext;
              
          }
    }
    
       function returnBonus($html)
    {  
        foreach($html->find('div[id=content-bonus]') as $element)
          { 
             return $element->innertext;
              
          }
          
    }
   
   

    
    function returndata($html1)
    {    $data = array();

         foreach($html1->find('div[class=inner flex-center-inline] a p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
    
    
?>