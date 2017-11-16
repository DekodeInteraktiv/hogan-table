<?php
/**
 * Table module class
 *
 * @package Hogan
 */

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\Table' ) ) {

	/**
	 * Table module class.
	 *
	 * @extends Modules base class.
	 */
	class Table extends Module {

		/**
		 * Table content
		 *
		 * @var string $table_content
		 */
		public $table_content;


		/**
		 * Module constructor.
		 */
		public function __construct() {

			$this->label    = __( 'Table', 'hogan-table' );
			$this->template = __DIR__ . '/assets/template.php';

			parent::__construct();
		}

		/**
		 * Field definitions for module.
		 */
		public function get_fields() {

			//todo: Check if field type exists?
			$fields = [
				[
					'type'         => 'table',
					'key'          => $this->field_key . '_table_content', // hogan_module_table_content.
					'label'        => __( 'Table Content', 'hogan-table' ),
					'name'         => 'table_content',
					'instructions' => '',
					'required'     => 1,
					'use_header'   => 0,
				],
			];

			return $fields;
		}

		/**
		 * Map fields to object variable.
		 *
		 * @param array $content The content value.
		 */
		public function load_args_from_layout_content( $content ) {
			$this->table_content = $content['table_content'] ?? null;

			parent::load_args_from_layout_content( $content );

		}

		/**
		 * Validate module content before template is loaded.
		 */
		public function validate_args() {
			return ! empty( $this->table_content );
		}
	}
} // End if().
