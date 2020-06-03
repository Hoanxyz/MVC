<?php
namespace Core;

interface ResourceModelInterface
{
	public function _init($table, $id, $model);

	public function create();

	public function delete($model);
}