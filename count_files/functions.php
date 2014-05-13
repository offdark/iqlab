<?php

/**
 * @author 
 * @copyright 2014
 */


    function download_file( $file ){ // DOWNLOADING FILE
        
        if( file_exists($file) ) {
           
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
                
            return  readfile($file);
    
        }
    }


    function extension( $type ){ // Cheking for the type of file to upload corect img
        
        $info = new SplFileInfo($type);
              
        switch ($info->getExtension()) {
            case 'doc':
                return $file_name = 'ext/doc.png';
                break;
            case 'DOC':
                return $file_name = 'ext/doc.png';
                break;
            case 'pdf':
                return $file_name = 'ext/pdf.png';
                break;
            case 'PDF':
                return $file_name = 'ext/pdf.png';
                break;
            default:
                return $type;
                break;
        }
    }
    
  
    function add_element( $id, $flag ){  
            
        // Open and parse the XML file
        $xml = simplexml_load_file("counter.xml");
        
        if( $flag == true ){     
            // Create element =)
            $new_item = $xml->addChild( "item" );
            $counter = 0;
            $new_item->addChild( "counter", $counter );
            // Add the text attribute
            $new_item->addAttribute( "id", $id );              
            $xml->asXML( 'counter.xml' ); // saving xml
                       
        }else{
            
            $item_to_edit = $xml->xpath('//item[@id="'.$id.'"]');
            $item_to_edit[0]->counter++;    
            $xml->asXML( 'counter.xml' ); // saving xml
             
            return $item_to_edit[0]->counter;           
        }
    }

    
    function remove_element( $id, $flag ){
        
        if( $flag == false ){     
        
            $doc = new DOMDocument();
            $doc->Load('counter.xml');
        
            foreach ( $doc->getElementsByTagName('files') as $tagcourses ) {
        
                foreach ( $tagcourses->getElementsByTagName('item') as $tagcourse ) {
        
                    if( ($tagcourse->getAttribute('id') ) == $id ) {  $tagcourse->parentNode->removeChild($tagcourse);  }
                }
            }
        
            $doc->Save('counter.xml');  
            
        }else{
            
            // Open and parse the XML file
            $xml = simplexml_load_file( 'counter.xml' );
            $item_to_edit = $xml->xpath( '//item[@id="'.$id.'"]' );
            $item_to_edit[0]->counter = 0;    
            $xml->asXML( 'counter.xml' ); // saving xml          
        }      
    }

?>