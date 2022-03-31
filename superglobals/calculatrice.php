
<?php
    if (!empty($_POST)){
        $nb1 = abs($_POST['nb1']);
        $nb2 = abs($_POST['nb2']);
        switch ($_POST['operator']){
            case 'add':
                echo $nb1 + $nb2;
                break;
            case 'remove':
                echo $nb1 - $nb2;
                break;
            case 'multiply':
                echo $nb1 * $nb2;
                break;
            case 'divide':
                echo $nb1 / $nb2;
                break;
            default:
                var_dump($_POST);
        }
    }
?>

<form method="post">
    <input type="number" name="nb1">
    <select name="operator" id="operator">
        <option value="add">+</option>
        <option value="remove">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="number" name="nb2">
    <input type="submit">
</form>
