<?php
class PigLatin
{
    public function translate()
    { 
        $text=$this->text=$_GET['text'];
    
        if ($text)  
        { 
            $wovels = 'aeiouy';     
            $suffix = "ay";         
            $phrase = $this->phrase=explode(" ", $text); //rozdělení řetězce na jednotlivá slova
    
            foreach($this->phrase as $word) //proiterování pole slov
            {  
               $wordLength = strlen($word); //nalezení délky aktuálního slova
               $pos = strcspn(strtolower($word), $wovels); //nalezení první samohlásky v aktuálním slově
               $firstLetter = substr($word,0,$pos); //uložení prvního písmene nebo písmen, které nejsou samohlásky
               $punctuation = substr($word,$wordLength - 1,$wordLength); //uložení posledního znaku v řetězci, je potřeba v případě, že tam je interpunkční znaménko
                if($wordLength > 2) //kontrola zda má slovo aspoň 3 písmena, jinak výpis originálního slova
                    {	          
                      if(preg_match("/(\?|\.|\!)$/", $word)) //kontrola, zda je v řetězci interpunkční znaménko
                        {  
                           $word = substr($word,0,$wordLength-1);//pokud existuje interpunkční znaménko, je odtrženo od řetězce
                            if($pos > 0) //pokud první písmeno není samohláska
                            { 
                            // odtržení souhlásek a přidání na konec, přidání "ay" a interpunkce na konec
                             echo ($this->pigWord =' '. substr($word,$pos) . '-' .$firstLetter . $suffix . $punctuation ); 
                            }
                            else
                            {
                            //pokud je 1. písmeno samohláska, přidání "ay" a interpunkce na konec
                             echo ($this->pigWord = ' '. $word . '-' .$suffix . $punctuation);
                            }  	
                        }
                      else
                        {   //pokud v řetězci není interpukční znaménko		
                            if($pos > 0)
                            {
                             echo ($this->pigWord =' '. substr($word,$pos) . '-'.$firstLetter . $suffix);
                            }
                            else
                            {
                             echo ($this->pigWord =' '. $word . '-' .$suffix);
                            }
                        }	
                    }
                else
                    { //pokud je řetězec kratší než 3 písmena, uložení originálního slova
                     echo $this->pigWord =' '. $word;  
                    }        
             
            }           
        }  
    }    
}
