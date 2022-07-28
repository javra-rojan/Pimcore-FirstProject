<?php

namespace Javra\ImportFromJsonBundle\Command;

use Google\Service\Transcoder\Input;
use http\Exception\RuntimeException;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Model\DataObject\Location;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ImportJsonCommand extends AbstractCommand
{
    private string $cmd_name = 'app:import:file:json';
    private string $cmd_description = 'Import json file command';
    protected function configure()
    {
        $this
            ->setName( $this->cmd_name )
            ->setDescription( $this->cmd_description);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
//        $filename = $this->getInputFilename($input, $output);
        try{
            $filename = '/home/rojan/Downloads/pim.json';
            is_file($filename) ? $this->writeInfo("File exists. \n \t Starting Import ... ") : $this->writeError('File does not exist');
            $contents = json_decode( file_get_contents( $filename ), true );
        }
        catch (\Exception $e){
            echo $e->getMessage();
        }
        createObjectFromArray($contents);
        return 0;
    }


    private function getInputFilename($input, $output){
        $helper = $this->getHelper('question');
        $ask_filename = new Question("Please enter filepath \n");
        $ask_filename->setValidator( function ($answer){
            if( empty($answer) ){
                throw new \RuntimeException("The filename cannot be empty");
            }
            return $answer;
        });
        return $helper->ask($input, $output, $ask_filename);
    }
}
