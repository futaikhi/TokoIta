<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $login = [
		'nama' => 'required',
		'noTelp' => 'required|max_length[13]|'
	];

	public $login_errors = [
		'nama' => [
			'required'      => 'Nama wajib diisi'
		],
		'noTelp' => [
			'required'          => 'No Telp wajib diisi',
			'max_length'    => 'Maksimal 13 karakter'
		]
	];

	public $gantiPassword = [
		'passwordLama' => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Pasword Wajib Diisi'
			]
		],
		'passwordBaru' => [
			'rules'  => 'required',
			'errors' => [
				'required' => 'Pasword Wajib Diisi'
			]
		],
		'confirmPassword'    => [
			'rules'  => 'required|matches[passwordBaru]',
			'errors' => [
				'matches' => 'Password tidak sama',
				'required' => 'Pasword Wajib Diisi'
			]
		],
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
