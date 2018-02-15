<?php
/**
 * Table module class
 *
 * @package Hogan
 */

declare( strict_types = 1 );

namespace Dekode\Hogan;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( '\\Dekode\\Hogan\\Table' ) && class_exists( '\\Dekode\\Hogan\\Module' ) ) {

	/**
	 * Table module class.
	 *
	 * @extends Modules base class.
	 */
	class Table extends Module {

		/**
		 * Table content.
		 *
		 * @var array $table_content
		 */
		public $table_content;

		/**
		 * Allowed HTML for table cell content.
		 *
		 * @var array $content_allowed_html
		 */
		public $content_allowed_html;

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
		 *
		 * @return array $fields Fields for this module
		 */
		public function get_fields(): array {

			$fields = [];

			$fields[] = [
				'type'         => 'table',
				'key'          => $this->field_key . '_table_content', // hogan_module_table_content.
				'label'        => __( 'Table Content', 'hogan-table' ),
				'name'         => 'table_content',
				'instructions' => apply_filters( 'hogan/module/table/instructions', __( 'Choose optional table header, drag and drop columns and rows to change order, use tab to move to the next and previous columns.', 'hogan-table' ) ),
				'required'     => 1,
				'use_header'   => 0,
			];

			return $fields;
		}

		/**
		 * Map raw fields from acf to object variable.
		 *
		 * @param array $raw_content Content values.
		 * @param int   $counter Module location in page layout.
		 *
		 * @return void
		 */
		public function load_args_from_layout_content( array $raw_content, int $counter = 0 ) {

			$this->table_content = $raw_content['table_content'] ?? null;

			$this->content_allowed_html = apply_filters( 'hogan/module/table/content/allowed_html', [
				'br'     => [],
				'p'      => [],
				'strong' => [],
			] );

			parent::load_args_from_layout_content( $raw_content, $counter );
		}

		/**
		 * Validate module content before template is loaded.
		 *
		 * @return bool Whether validation of the module is successful / filled with content.
		 */
		public function validate_args(): bool {
			return ! empty( $this->table_content );
		}
	}
} // End if().
