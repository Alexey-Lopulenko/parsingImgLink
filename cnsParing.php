<?php


require_once 'classes/parsing.php';
//use classes\parsing;

system("clear"); //Очищаем экран перед выводом
// Шапка программы (там написано contacts)
echo "             _           _\n";
echo " ___ ___ ___| |_ ___ ___| |_ ___\n";
echo "|  _| . |   |  _| .'|  _|  _|_ -|\n";
echo "|___|___|_|_|_| |__,|___|_| |___|\n";


switch ($argv[1]) {
    case 'parse ':
        if (isset($argv[2])) {
            $pars = new parsing();
            $pars->setCurrentUrl($argv[2]);
            $pars->setInternalLinks();
            $test = $pars->getInternalLinks();
            if(count($test)>0){
                $i = 0;
                while($test){
                    $newLink = new parsing();
                    $newLink->setCurrentUrl($test[$i]);
                    $newLink->getImageLink();
                    $pars->addInternalLink($test[$i]);
                    $pars->setVisitedPages($test[$i]);
                    $pars->deleteInternalLinks($test[$i]);
//        echo 'good';break;

                    if(count($pars->getVisitedPages()) > 5){
                        var_dump($pars->getVisitedPages());
                        break;
                    }
                    $i++;
                }
            }else{
                echo 'Error';
            }
        }
        echo "Ошибка параметра, воспользуйтесь справкой \n";
        break;
//    case 'edit':
//        if (isset($argv[2])) {
//            $do = new action();
//            $do ->edit($argv[2]);
//        }
//        echo "Ошибка параметра, воспользуйтесь справкой \n";
//        break;
    case 'add':
       echo 'add';
        break;
//    case 'delete':
//////        if (isset($argv[2])) {
//////            $do = new action();
//////            $do ->delete($argv[2]);
//////        }
//////        echo "Ошибка параметра, воспользуйтесь справкой \n";
//////        break;
//////    case 'help':
//////        $do = new action();
//////        $do ->help();
//////        break;

    default:
        // Если параметр нам не подходит, или его нет, говорим об ошибке
        echo "Ошибка параметра, воспользуйтесь справкой \n";
        break;
}
echo "\n"; // Делаем ещё один перевод строки, что бы отделить вывод программы



//$pars = new parsing();
//$pars->setCurrentUrl($argv[1]);
//$pars->setParseUrlLimit(500);
//
//$pars->setInternalLinks();
//$test = $pars->getInternalLinks();
////$test = $pars->mainLink();
//var_dump($test[0]);
//
//
//if(count($test)>0){
//    $i = 0;
//    while($test){
//        $newLink = new parsing();
//        $newLink->setCurrentUrl($test[$i]);
//        $newLink->getImageLink();
//        $pars->addInternalLink($test[$i]);
//        $pars->setVisitedPages($test[$i]);
//        $pars->deleteInternalLinks($test[$i]);
////        echo 'good';break;
//
//        if(count($pars->getVisitedPages()) > 5){
//            var_dump($pars->getVisitedPages());
//            break;
//        }
//        $i++;
//    }
//}else{
//    echo 'Error';
//}




/*$result = dns_get_record($argv[1]);
print_r($result);*/


//    echo ($i+1).PHP_EOL;

