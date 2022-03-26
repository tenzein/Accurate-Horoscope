<?php
    include('simple_html_dom.php');

    $sign = "";

  if($_POST["sign"] ) {
        
        $sign = $_POST["sign"];
        
  }
  if($sign!="")
  {
    $url = "https://www.astrology.com/horoscope/weekly-overview/".$sign . ".html";
    
    $love_url = "https://www.astrology.com/horoscope/weekly-love/".$sign . ".html";
    
    $work_url = "https://www.astrology.com/horoscope/weekly-work/".$sign . ".html";
    
    $dating_url = "https://www.astrology.com/horoscope/weekly-dating/".$sign . ".html";
    


    $html = file_get_html($url);
    
    $date = returnDate($html);
    
    $this_week = returnData($html);
    
    
    $details = $this_week[2]. "\n\n". $this_week[3] . "\n\n". $this_week[4];
    
    /*love fetch*/
    
    $love_html =file_get_html($love_url);
    
    $love_data= returnLove($love_html);
    $love_details = $love_data[2]. "\n\n". $love_data[3] . "\n\n". $love_data[4];

 /*work fetch*/
    
    $work_html =file_get_html($work_url);
    
    $work_data= returnWork($work_html);
    $work_details = $work_data[2]. "\n\n". $work_data[3] . "\n\n". $work_data[4];


 /*dating fetch*/
    
    $dating_html =file_get_html($dating_url);
    
    $dating_data= returnDating($dating_html);

    $result= [
        'data'=>array(
            "date"=> strip_tags($date[0]),
            "overview"=>strip_tags($details),
            "love"=>strip_tags($love_details),
            "work"=>strip_tags($work_details),
            "dating"=>strip_tags($dating_data[0])
                )    ];
    
    
    echo json_encode($result);

  }else
  echo "Invalid Token";
  
    function returnDate($html)
    {    $data = array();

         foreach($html->find('div[class=grid-layout-2col-stacked] main h4') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
   
    
    function returnData($html)
    {   
        $data = array();

         foreach($html->find('div[class=grid-layout-2col-stacked] main p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
   
     function returnLove($html)
    {    $data = array();

         foreach($html->find('div[class=grid-layout-2col-stacked] main p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
   
     function returnWork($html)
    {    $data = array();

         foreach($html->find('div[class=grid-layout-2col-stacked] main p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
   
     function returnDating($html)
    {   $data = array();

         foreach($html->find('div[class=grid-layout-2col-stacked] main p') as $element)
          { 
              $data[]=$element->innertext;
              
          }
          return $data;
    }
    

   
?>