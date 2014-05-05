<?php

header("Content-Type: text/html; charset=utf-8");

//editing item from storage.xml
if( isset($_POST['edit']) ){
    $id = $_POST['id'];
}

//saving edited items from storage.xml
if( isset($_POST['edit_save']) ){

    $item = simplexml_load_file("storage.xml");

    $user = $item->xpath('//item[@id="'.$_POST['edit_item_id'].'"]');
    $user[0]->text  = $_POST['edit_text'];

    $item->asXML('storage.xml');

} // end of saving edited element

//removing item from storage.xml
if ( isset($_POST['delete']) ){

    $del_id = $_POST['id'];
    $doc    = new DOMDocument();
    $doc->Load('storage.xml');

    foreach ( $doc->getElementsByTagName('events') as $tagcourses ) {

        foreach ( $tagcourses->getElementsByTagName('item') as $tagcourse ) {

            if( ($tagcourse->getAttribute('id') ) == $del_id ) {  $tagcourse->parentNode->removeChild($tagcourse);  }
        }
    }

    $doc->Save('storage.xml');

} // end of removing


//Add after any position listed
if( isset($_POST['add_position']) ){

    function insertAfter( SimpleXMLElement $new, SimpleXMLElement $target) { // adding element 
        
        $target = dom_import_simplexml($target);
        $new    = $target->ownerDocument->importNode(dom_import_simplexml($new), true);
        
        if ($target->nextSibling) {
            $target->parentNode->insertBefore($new, $target->nextSibling);
            
        } else {
            $target->parentNode->appendChild($new);
        }
    }
    
    $looking_id = isset( $_POST['looking_id'] ) ? htmlentities( $_POST['looking_id'] ) : null;
    $text       = isset( $_POST['text'] )       ? htmlentities( $_POST['text'] )       : null;
    $add_id     = microtime(true);

    $item    = simplexml_load_file("storage.xml");
    $element = $item->xpath('//item[@id="' .$looking_id. '"]');
        
    if (!empty($element)) {
        $new = new SimpleXMLElement('<item id="' .$add_id. '"><text>' .$text. '</text></item>');
        insertAfter($new, $element[0]);
        $item->asXML('storage.xml');
    }


}//END OF Add before any position listed



//adding new item to storage.xml
if( isset($_POST['add']) ){

    $add_id   = microtime(true);
    $text = isset( $_POST['text'] ) ? htmlentities( $_POST['text'] ) : null;

    // Open and parse the XML file
    $xml = simplexml_load_file("storage.xml");

    // Creating children =)
    $new_item = $xml->addChild( "item" );
    $new_item->addChild( "text", $text );

    // Add the text attribute
    $new_item->addAttribute( "id", $add_id );

    // saving xml
    $xml->asXML( 'storage.xml' );
}
else

?>
<!DOCTYPE html>
<html>
<head>

    <script>
        function deleletconfig(){

            var del=confirm("Are you sure you want to delete this record?");
            return del;
        }
    </script>
</head>

<body>

<form method="POST" action="index.php">

    Add to the end of list: <input name="text"  type="text" required>
    <input type="submit"  name="add" value="Add" />
    <input name="reset"  type="reset" value="Clear"/>

</form>
<br />
Add element after any position listed:
<form method="POST" action="index.php">

    ID: <input name="looking_id"  type="text" required>     Text: <input name="text"  type="text" required>
    <input type="submit"  name="add_position" value="Add" />
    <input name="reset"  type="reset" value="Clear"/>

</form>
<br />

<table  border="0" width="600" > <!-- START of Second table -->

    <tr bgcolor="#9acd32">

        <th>ID</th>
        <th>Text</th>
        <th colspan="2">Edit</th>

    </tr>

    <?php

    $item = simplexml_load_file("storage.xml"); // showing xml items
    if(isset($id)): //if id is set show xml element for edit ?>

        <?php  $item_to_edit = $item->xpath('//item[@id="'.$id.'"]'); ?>

        <form method="POST" action="index.php">

            <tr>
                <td  align="center"> <?php echo $item_to_edit[0]->attributes()->id; ?>   </td>
                <td  align="center">
                    <input name="edit_text" type="text"  required value="<?php echo htmlspecialchars($item_to_edit[0]->text); ?>">
                </td>
                <td  align="center">
                    <input type="hidden" name="edit_item_id" value="<?php echo htmlspecialchars($item_to_edit[0]->attributes()->id); ?>" />
                    <input type="submit"  name="edit_save" value="save" />
                </td>
                <td  align="center">
                    <a href="index.php"> back </a>
                </td>

            </tr>

        </form>

    <?php  else: // showing all elements in storage.xml
        foreach ($item as $item): //foreach START?>

            <form method="POST" action="index.php">

                <tr>

                    <td  align="center"><?php  echo $item->attributes()->id;  ?> </td>
                    <td  align="center"><?php  echo $item->text;  ?> </td>
                    <td  align="center">
                        <input type="submit"  name="edit" value="Edit" />
                    </td>
                    <td  align="center">
                        <input type="submit"  name="delete" value="Delete" onclick="return deleletconfig()" />
                        <input type="hidden" name="id" value="<?php  echo htmlspecialchars($item->attributes()->id);  ?>" />
                    </td>

                </tr>

            </form>

        <?php endforeach; //foreach END

    endif; ?>

</table> <!-- END of Second table -->
</body>
</html>