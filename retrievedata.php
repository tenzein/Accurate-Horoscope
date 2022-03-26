<?php
    include('simple_html_dom.php');


    $name = "User";
    $card1="";
    $card2 ="";
    $card3="";
    $type="";
    
    if(!empty($_GET['card1'])|| !empty($_GET['card2']) || !empty($_GET['card3'])|| !empty($_GET['type'])) {
        
        $card1= $_GET['card1'];
        
        $card2= $_GET['card2'];
        $card3= $_GET['card3'];
        
        $type= $_GET['type'];
        
    }
    
    
    if($type=="three")
    {

    $result = getCurlResponse($card1,$card2,$card3);
        
        echo $result;
    }
    if($type=="monthly")
    {

    $result = getMonthlyResponse($card1,$card2,$card3);
        
        echo $result;
    }
    else if($type=="daily")
    {
        echo getDailyResponse($card1);
        
    }
    
    else if($type=="love")
    {
        echo getDailyLoveResponse($card1);
        
    }
     
    else if($type=="career")
    {
        echo getDailyCareerResponse($card1);
        
    }
    else if($type=="yes")
    {
        echo getYesNoResponse($card1);
        
    }
      else if($type=="flirt")
    {
        echo getFlirtResponse($card1);
        
    }
    else if($type=="breakup")
    {
        echo getBreakUpResponse($card1,$card2);
        
    }
    else if($type=="yenyang")
    {
        echo getYenYangResponse($card1,$card2);
        
    }else if($type=="money")
    {
        echo getMoneyResponse($card1);
        
    }
    else if($type=="angel")
    {
        echo getAngelResponse($card1);
        
    }
    
    
     function getCurlResponse($card1,$card2,$card3)
     {
         
        $url = 'https://www.horoscope.com/us/tarot/tarot-daily.aspx';
        
        $fields =array(
            'FirstName'=>'User',
            'CardNumber_1_numericalint'=>$card1,
            'CardNumber_2_numericalint'=>$card2,
            'CardNumber_3_numericalint'=>$card3
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
     
     function getDailyResponse($card1)
     {
         
        $url = 'https://www.astrology.com/tarot/daily.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
   
   
   function getDailyLoveResponse($card1)
     {
         
        $url = 'https://www.astrology.com/tarot/daily-love.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
   
   
    function getDailyCareerResponse($card1)
     {
         
        $url = 'https://www.astrology.com/tarot/daily-career.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
   
   
    function getYesNoResponse($card1)
     {
         
        $url = 'https://www.astrology.com/tarot/yes-no.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
   
    function getFlirtResponse($card1)
     {
         
        $url = 'https://www.astrology.com/tarot/daily-flirt.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
     
     function getBreakUpResponse($card1,$card2)
     {
         
        $url = 'https://www.astrology.com/tarot/breakup.html';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1,
            'CardNumber_2_numericalint'=>$card2
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
      function getYenYangResponse($card1,$card2)
     {
         
        $url = 'https://www.astrology.com/us/tarot/tarot-yin-yang.aspx';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1,
            'CardNumber_2_numericalint'=>$card2
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
     
      function getMonthlyResponse($card1,$card2,$card3)
     {
         
        $url = 'https://www.horoscope.com/us/tarot/tarot-monthly.aspx';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1,
            'CardNumber_2_numericalint'=>$card2,
            'CardNumber_3_numericalint'=>$card3
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
     function getMoneyResponse($card1)
     {
         
        $url = 'https://www.horoscope.com/us/tarot/tarot-money-oracle.aspx';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
     function getAngelResponse($card1)
     {
         
        $url = 'https://www.horoscope.com/us/tarot/tarot-angel.aspx';
        
        $fields =array(
            'CardNumber_1_numericalint'=>$card1
            );
        
        
        $postvars = http_build_query($fields);
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST,$fields);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
     }
     
?>