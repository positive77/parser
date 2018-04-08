<?php
 class ParseLeonBetsCommand extends CConsoleCommand
{
    public function run($args) {
        $parser = new LeonbetsParser();
        $parser->ParseAll();
    }
}