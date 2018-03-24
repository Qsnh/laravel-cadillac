<?php

namespace Qsnh\Cadillac;

use DB;
use Exception;
use Illuminate\Console\Command;
use cebe\markdown\GithubMarkdown;

class Cadillac extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cadillac {table?} {--export} {--html}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cadillac is a database tool.';

    /**
     * Database Name
     * @var string
     */
    protected $db;

    protected $markdownRenderView;
    protected $htmlRenderView;

    public function __construct()
    {
        parent::__construct();
        $this->db = env('DB_DATABASE');
        $this->markdownRenderView = realpath(dirname(__FILE__) . '/../template/markdown.blade.php');
        $this->htmlRenderView = realpath(dirname(__FILE__) . '/../template/html.blade.php');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Params
        $table = $this->argument('table');
        // Option Params
        $options = $this->options();
        $export = $options['export'];
        $toHtml = $options['html'];

        if ($table) {
            return $this->executeTableAction($table, $export, $toHtml);
        }

        if ($export) {
            return $this->exportAllTables($toHtml);
        }

        $tables = $this->getAllTables();
        $rows = [];
        foreach ($tables as $tableName) {
            $rows[] = [$tableName];
        }

        $this->table(['Table'], $rows);
    }

    /**
     * Export Tables to file
     */
    protected function exportAllTables($toHtml)
    {
        $tables = $this->getAllTables();
        $rows = [];
        foreach ($tables as $key => $table) {
            $columns = $this->getTableColumns($table);
            $rows[$table] = $columns;
        }
    
        $extension = '.md';
        $viewPath = $this->markdownRenderView;
        if ($toHtml) {
            $extension = '.html';
            $viewPath = $this->htmlRenderView;
        } elseif (false) {
            // ToDo
        }
        $renderContent = app('Illuminate\View\Factory')->file($viewPath, ['tables' => $rows])->render();

        $path = storage_path('app/export' . $extension);
        file_put_contents($path, $renderContent);

        $this->info('export file: ' . $path);
    }

    /**
     * Get all tables in database
     * 
     * @return array
     */
    protected function getAllTables()
    {
        $tables = DB::select('show tables');
        $box = [];
        $key = 'Tables_in_' . $this->db;
        foreach ($tables as $tableName) {
            $tableName = $tableName->$key;
            $box[] = $tableName;
        }
        return $box;
    }

    protected function executeTableAction($tableName, $export, $toHtml = false)
    {
        $columns = $this->getTableColumns($tableName);
        $rows = [];
        foreach ($columns as $column) {
            $rows[] = [
                $column->COLUMN_NAME, $column->COLUMN_TYPE, $column->COLUMN_DEFAULT,
                $column->IS_NULLABLE, $column->EXTRA, $column->COLUMN_COMMENT,
            ];
        }
        $header = ['Column', 'Type', 'Default', 'Nullable', 'Extra', 'Comment'];
        $this->table($header, $rows);
    }

    /**
     * Get table columns
     * 
     * @param $table string
     * @return array
     */
    protected function getTableColumns($table)
    {
         $columns = DB::select('select * from information_schema.columns where table_schema = "' . $this->db . '" and table_name = "' . $table . '"');
        if (! $columns) {
            throw new TableNotFoundException($table);
        }
        return $columns;
    }

}