<?php

namespace Javra\ImportFromJsonBundle\Command;

use Google\Service\Transcoder\Input;
use http\Exception\RuntimeException;
use Pimcore\Console\AbstractCommand;
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
//        $filename = '/home/rojan/Downloads/printdatafeed_df_v2.json';
//        is_file($filename) ? $this->writeInfo("File exists. \n \t Starting Import ... ") : $this->writeError('File does not exist');
//        $contents = json_decode( file_get_contents( $filename ), true );
//        $class_name = print_r( array_key_first($contents));

         $contents = array(
             'name' => 'rojan',
             'age' => '12',
             'course' => array('data structure', 'big data', 'ipv6'),
             'family' => array(
                 'father' => array(
                     'name' => 'ram',
                     'role' => 'dad'
                 ),
                 'mother' => array(
                     'name' => 'sita',
                     'role' => 'mom',
                     'maternal' => array(
                         'maternal_mom' => 'rr'
                     )
                 )
             )
         );
        $flattened_array = $this->flatten_array($contents);
        print_r( $flattened_array );
        return 0;
    }

    private function flatten_array(array $array, array $flattened = [] ){
        foreach( $array as $row ){
            if(is_array($row)){
                $flattened = $this->flatten_array($row, $flattened);
                continue;
            }
            $flattened[] = $row;
        }
        return $flattened;
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
