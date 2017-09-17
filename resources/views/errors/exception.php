<div>
    <h3>Exception: <?=$Exception->getMessage()?></h3>
    file: <?=$Exception->getFile();?><br>
    line: <?=$Exception->getLine();?><br>
    <pre>trace:
<?=$Exception->getTraceAsString()?></pre>
</div>