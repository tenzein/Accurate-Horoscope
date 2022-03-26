<?php
    include('simple_html_dom.php');
    
    
    if( $_POST["type"] || $_POST["cardOne"] || $_POST["cardTwo"] || $_POST["cardThree"]) 
   {
       $type=$_POST['type'];
       $card1= $_POST["cardOne"];
       $card2 = $_POST["cardTwo"];
       $card3 = $_POST["cardThree"];
   

    $url1 = "https://softbytesprojects.000webhostapp.com/retrievedata.php?card1=".$card1."&card2=".$card2."&card3=".$card3."&type=".$type;

    $html1 = file_get_html($url1);

            if($type=="three")
            {
                $data = returnData($html1);
                $result = [
                    'data'=> strip_tags($data)
                    ];
                    
                    echo json_encode($result);
                
            }if($type=="monthly")
            {
                $data = returnMonthlyData($html1);
                
                $result = [
                    'data'=> strip_tags($data[0])."<br><br>". strip_tags($data[1]). "<br><br>".  strip_tags($data[3])
                    ];
                    
                 echo json_encode($result);
                
            }else if($type=="daily" || $type=="love" ||$type=="career" || $type=="flirt")
            {
                $data = returnDaily($html1);
                
                $result = [
                    'data'=> strip_tags($data)
                    ];
                    
                    echo json_encode($result);
                    
            } else if($type=="breakup"|| $type=="yenyang")
            {
                $data = returnTwoCards($html1);
                $result = [
                    'data'=> $data[0] ."<br><br>". $data[1]
                    ];
                    
                    echo json_encode($result);
            } else if($type=="yes")
            {
                $data = returnYes($html1);
                
                $result = [
                    'data'=> $data
                    ];
                    
                 echo json_encode($result);
                
            }
             else if($type=="money")
            {
                $data = returnMoney($html1);
                
                $result = [
                    'data'=> strip_tags($data)
                    ];
                    
                 echo json_encode($result);
                
            }
            
            else if($type=="angel")
            {
                $data = returnAngel($html1);
                $result = [
                    'data'=> strip_tags($data[0])."<br>".strip_tags($data[1])
                    ];
                    
                 echo json_encode($result);
                
            }
    
   } 
   else
   echo "Invalid Token";

   
    
     function returnData($html)
        {   
    
             foreach($html->find('div[class=tarot-deck module-skin text-center] p') as $element)
              { 
                  return $element->innertext;
                  
              }
              
        }
        
        
     function returnMonthlyData($html)
        {   $data = array();
            
             foreach($html->find('div[class=tarot-deck module-skin text-center] p') as $element)
              { 
                  $data[]= $element->innertext;
                  
              }
              
              return $data;
              
        }
    
     function returnDaily($html)
        {   
    
             foreach($html->find('div[class=result-content grid-md-c2-s2 grid-lg-c3-s3] p') as $element)
              { 
                  return $element->innertext;
                  
              }
              
        }
        
        function returnYes($html)
        {   
    
             foreach($html->find('div[class=result-content grid-md-c2-s2 grid-lg-c3-s3] p') as $element)
              { 
                  return $element->innertext;
                  
              }
              
        }
        
    function returnMoney($html)
        {   
    
             foreach($html->find('div[class=grid grid-left-sidebar tarot-deck module-skin] p') as $element)
              { 
                  return $element->innertext;
                  
              }
              
        }
        
        function returnAngel($html)
        {   
            $data = array();
           
            foreach($html->find('div[class=grid grid-left-sidebar tarot-deck module-skin] h3') as $element)
              { 
                  $data[] = $element->innertext;
                  
              }
            
             foreach($html->find('div[class=grid grid-left-sidebar tarot-deck module-skin] p') as $element)
              { 
                  $data[] = $element->innertext;
                  
              }
              return $data;
        }
        
        
      function returnTwoCards($html)
        {   $data = array();

             foreach($html->find('div[class=result-content grid-md-c2-s2 grid-lg-c3-s3] p') as $element)
              { 
                  $data[] = $element->innertext;
                  
              }
              return $data;
        }
     
     
?>