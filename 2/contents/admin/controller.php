<?php

namespace Pterodactyl\Http\Controllers\Admin\Extensions\{identifier};

use Illuminate\View\View;
use Illuminate\View\Factory as ViewFactory;
use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Pterodactyl\Contracts\Repository\SettingsRepositoryInterface;
use Pterodactyl\Http\Requests\Admin\AdminFormRequest;
use Illuminate\Http\RedirectResponse;

// https://blueprint.zip/docs/?page=documentation/$blueprint
use Pterodactyl\BlueprintFramework\Libraries\ExtensionLibrary\Admin\BlueprintAdminLibrary as BlueprintExtensionLibrary;

class {identifier}ExtensionController extends Controller
{
  public function __construct(
    private ViewFactory $view,
    private BlueprintExtensionLibrary $blueprint,
    private ConfigRepository $config,
    private SettingsRepositoryInterface $settings,
  ) {}
  
  public function index(): View
  {

    // GET DATABASE VALUES
    $config_1 = $this->blueprint->dbGet('{identifier}', 'config:1');
    $config_2 = $this->blueprint->dbGet('{identifier}', 'config:2');
    $config_3 = $this->blueprint->dbGet('{identifier}', 'config:3');

    // SET DEFAULT DATABASE VALUES
    $defaultConfig1 = "hello, world";
    $defaultConfig2 = "string input";
    $defaultConfig3 = "#101010";
    
    // APPLY DEFAULT DATABASE VALUES
    if($config_1 == "") { $this->blueprint->dbSet('{identifier}', 'config:1', "$defaultConfig1"); $config_1 = $defaultConfig1; };
    if($config_2 == "") { $this->blueprint->dbSet('{identifier}', 'config:2', "$defaultConfig2"); $config_2 = $defaultConfig2; };
    if($config_3 == "") { $this->blueprint->dbSet('{identifier}', 'config:3', "$defaultConfig3"); $config_3 = $defaultConfig3; };

    return $this->view->make(
      'admin.extensions.{identifier}.index', [
        'config_1' => $config_1,
        'config_2' => $config_2,
        'config_3' => $config_3,

        'root' => "/admin/extensions/{identifier}",
        'blueprint' => $this->blueprint,
      ]
    );
  }
  /**
   * @throws \Pterodactyl\Exceptions\Model\DataValidationException
   * @throws \Pterodactyl\Exceptions\Repository\RecordNotFoundException
   */
  public function update({identifier}SettingsFormRequest $request): RedirectResponse
  {
    foreach ($request->normalize() as $key => $value) {
      $this->settings->set('{identifier}::' . $key, $value);
    }

    return redirect()->route('admin.extensions.{identifier}.index');
  }
}
class {identifier}SettingsFormRequest extends AdminFormRequest
{
  public function rules(): array
  {
    /* 
      Learn more about Laravel input validation:
      https://laravel.com/docs/10.x/validation#available-validation-rules
    */
    return [
      'config:1' => 'string',
      'config:2' => 'string',
      'config:3' => 'starts_with:#|string',
    ];
  }

  public function attributes(): array
  {
    return [
      'config:1' => 'Config 1',
      'config:2' => 'Config 2',
      'config:3' => 'Config 3',
    ];
  }
}
