<?php
return array (
  'router' => 
  array (
    'routes' => 
    array (
      'home' => 
      array (
        'type' => 'Literal',
        'options' => 
        array (
          'route' => '/',
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\Index',
            'action' => 'index',
          ),
        ),
      ),
      'zf-apigility' => 
      array (
        'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
        'options' => 
        array (
          'route' => '/apigility',
        ),
        'may_terminate' => false,
        'child_routes' => 
        array (
          'documentation' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Segment',
            'options' => 
            array (
              'route' => '/documentation[/:api[-v:version][/:service]]',
              'constraints' => 
              array (
                'api' => '[a-zA-Z][a-zA-Z0-9_]+',
              ),
              'defaults' => 
              array (
                'controller' => 'ZF\\Apigility\\Documentation\\Controller',
                'action' => 'show',
              ),
            ),
          ),
        ),
      ),
      'oauth' => 
      array (
        'type' => 'regex',
        'options' => 
        array (
          'route' => '/oauth',
          'defaults' => 
          array (
            'controller' => 'ZF\\OAuth2\\Controller\\Auth',
            'action' => 'token',
          ),
          'spec' => '%oauth%',
          'regex' => '(?P<oauth>(/oauth))',
        ),
        'may_terminate' => true,
        'child_routes' => 
        array (
          'authorize' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/authorize',
              'defaults' => 
              array (
                'action' => 'authorize',
              ),
            ),
          ),
          'resource' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/resource',
              'defaults' => 
              array (
                'action' => 'resource',
              ),
            ),
          ),
          'code' => 
          array (
            'type' => 'Zend\\Mvc\\Router\\Http\\Literal',
            'options' => 
            array (
              'route' => '/receivecode',
              'defaults' => 
              array (
                'action' => 'receiveCode',
              ),
            ),
          ),
        ),
      ),
      'logistica.rest.filial' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/logistica/filial[/:filial_id]',
          'defaults' => 
          array (
            'controller' => 'Logistica\\V1\\Rest\\Filial\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'logistica.rest.estoque' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/logistica/estoque[/:estoque_id]',
          'defaults' => 
          array (
            'controller' => 'Logistica\\V1\\Rest\\Estoque\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'loja.rest.marcas' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/marcas[/:marcas_id]',
          'defaults' => 
          array (
            'controller' => 'Loja\\V1\\Rest\\Marcas\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
      'administrador.rest.usuarios' => 
      array (
        'type' => 'Segment',
        'options' => 
        array (
          'route' => '[/v:version]/administrador/usuarios[/:usuarios_id]',
          'defaults' => 
          array (
            'controller' => 'Administrador\\V1\\Rest\\Usuarios\\Controller',
            'version' => 1,
          ),
          'constraints' => 
          array (
            'version' => '\\d+',
          ),
        ),
      ),
    ),
  ),
  'service_manager' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\Cache\\Service\\StorageCacheAbstractServiceFactory',
      1 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      2 => 'Zend\\Log\\LoggerAbstractServiceFactory',
      3 => 'Zend\\Db\\Adapter\\AdapterAbstractServiceFactory',
      4 => 'ZF\\Apigility\\DbConnectedResourceAbstractFactory',
      5 => 'ZF\\Apigility\\TableGatewayAbstractFactory',
    ),
    'invokables' => 
    array (
      'ZF\\Apigility\\MvcAuth\\UnauthenticatedListener' => 'ZF\\Apigility\\MvcAuth\\UnauthenticatedListener',
      'ZF\\Apigility\\MvcAuth\\UnauthorizedListener' => 'ZF\\Apigility\\MvcAuth\\UnauthorizedListener',
      'AssetManager\\Service\\MimeResolver' => 'AssetManager\\Service\\MimeResolver',
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationPostListener' => 'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationPostListener',
      'ZF\\MvcAuth\\Authorization\\DefaultAuthorizationPostListener' => 'ZF\\MvcAuth\\Authorization\\DefaultAuthorizationPostListener',
      'ZF\\ContentNegotiation\\ContentTypeListener' => 'ZF\\ContentNegotiation\\ContentTypeListener',
      'ZF\\Rest\\RestParametersListener' => 'ZF\\Rest\\Listener\\RestParametersListener',
      'ZF\\Versioning\\VersionListener' => 'ZF\\Versioning\\VersionListener',
    ),
    'factories' => 
    array (
      'AssetManager\\Service\\AssetManager' => 'AssetManager\\Service\\AssetManagerServiceFactory',
      'AssetManager\\Service\\AssetFilterManager' => 'AssetManager\\Service\\AssetFilterManagerServiceFactory',
      'AssetManager\\Service\\AssetCacheManager' => 'AssetManager\\Service\\AssetCacheManagerServiceFactory',
      'AssetManager\\Service\\AggregateResolver' => 'AssetManager\\Service\\AggregateResolverServiceFactory',
      'AssetManager\\Resolver\\MapResolver' => 'AssetManager\\Service\\MapResolverServiceFactory',
      'AssetManager\\Resolver\\PathStackResolver' => 'AssetManager\\Service\\PathStackResolverServiceFactory',
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 'AssetManager\\Service\\PrioritizedPathsResolverServiceFactory',
      'AssetManager\\Resolver\\CollectionResolver' => 'AssetManager\\Service\\CollectionResolverServiceFactory',
      'AssetManager\\Resolver\\ConcatResolver' => 'AssetManager\\Service\\ConcatResolverServiceFactory',
      'AssetManager\\Resolver\\AliasPathStackResolver' => 'AssetManager\\Service\\AliasPathStackResolverServiceFactory',
      'ZF\\ApiProblem\\Listener\\ApiProblemListener' => 'ZF\\ApiProblem\\Factory\\ApiProblemListenerFactory',
      'ZF\\ApiProblem\\Listener\\RenderErrorListener' => 'ZF\\ApiProblem\\Factory\\RenderErrorListenerFactory',
      'ZF\\ApiProblem\\Listener\\SendApiProblemResponseListener' => 'ZF\\ApiProblem\\Factory\\SendApiProblemResponseListenerFactory',
      'ZF\\ApiProblem\\View\\ApiProblemRenderer' => 'ZF\\ApiProblem\\Factory\\ApiProblemRendererFactory',
      'ZF\\ApiProblem\\View\\ApiProblemStrategy' => 'ZF\\ApiProblem\\Factory\\ApiProblemStrategyFactory',
      'ZF\\OAuth2\\Adapter\\PdoAdapter' => 'ZF\\OAuth2\\Factory\\PdoAdapterFactory',
      'ZF\\OAuth2\\Adapter\\IbmDb2Adapter' => 'ZF\\OAuth2\\Factory\\IbmDb2AdapterFactory',
      'ZF\\OAuth2\\Adapter\\MongoAdapter' => 'ZF\\OAuth2\\Factory\\MongoAdapterFactory',
      'ZF\\OAuth2\\Provider\\UserId\\AuthenticationService' => 'ZF\\OAuth2\\Provider\\UserId\\AuthenticationServiceFactory',
      'ZF\\OAuth2\\Service\\OAuth2Server' => 'ZF\\MvcAuth\\Factory\\NamedOAuth2ServerFactory',
      'ZF\\MvcAuth\\Authentication' => 'ZF\\MvcAuth\\Factory\\AuthenticationServiceFactory',
      'ZF\\MvcAuth\\ApacheResolver' => 'ZF\\MvcAuth\\Factory\\ApacheResolverFactory',
      'ZF\\MvcAuth\\FileResolver' => 'ZF\\MvcAuth\\Factory\\FileResolverFactory',
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationListener' => 'ZF\\MvcAuth\\Factory\\DefaultAuthenticationListenerFactory',
      'ZF\\MvcAuth\\Authentication\\AuthHttpAdapter' => 'ZF\\MvcAuth\\Factory\\DefaultAuthHttpAdapterFactory',
      'ZF\\MvcAuth\\Authorization\\AclAuthorization' => 'ZF\\MvcAuth\\Factory\\AclAuthorizationFactory',
      'ZF\\MvcAuth\\Authorization\\DefaultAuthorizationListener' => 'ZF\\MvcAuth\\Factory\\DefaultAuthorizationListenerFactory',
      'ZF\\MvcAuth\\Authorization\\DefaultResourceResolverListener' => 'ZF\\MvcAuth\\Factory\\DefaultResourceResolverListenerFactory',
      'ZF\\Hal\\JsonRenderer' => 'ZF\\Hal\\Factory\\HalJsonRendererFactory',
      'ZF\\Hal\\JsonStrategy' => 'ZF\\Hal\\Factory\\HalJsonStrategyFactory',
      'ZF\\Hal\\MetadataMap' => 'ZF\\Hal\\Factory\\MetadataMapFactory',
      'Request' => 'ZF\\ContentNegotiation\\Factory\\RequestFactory',
      'ZF\\ContentNegotiation\\AcceptListener' => 'ZF\\ContentNegotiation\\Factory\\AcceptListenerFactory',
      'ZF\\ContentNegotiation\\AcceptFilterListener' => 'ZF\\ContentNegotiation\\Factory\\AcceptFilterListenerFactory',
      'ZF\\ContentNegotiation\\ContentTypeFilterListener' => 'ZF\\ContentNegotiation\\Factory\\ContentTypeFilterListenerFactory',
      'ZF\\ContentNegotiation\\ContentNegotiationOptions' => 'ZF\\ContentNegotiation\\Factory\\ContentNegotiationOptionsFactory',
      'ZF\\ContentValidation\\ContentValidationListener' => 'ZF\\ContentValidation\\ContentValidationListenerFactory',
      'ZF\\Rest\\OptionsListener' => 'ZF\\Rest\\Factory\\OptionsListenerFactory',
      'Logistica\\V1\\Rest\\Filial\\FilialResource' => 'Logistica\\V1\\Rest\\Filial\\FilialResourceFactory',
      'Logistica\\V1\\Rest\\Estoque\\EstoqueResource' => 'Logistica\\V1\\Rest\\Estoque\\EstoqueResourceFactory',
      'ZfrCors\\Mvc\\CorsRequestListener' => 'ZfrCors\\Factory\\CorsRequestListenerFactory',
      'ZfrCors\\Options\\CorsOptions' => 'ZfrCors\\Factory\\CorsOptionsFactory',
      'ZfrCors\\Service\\CorsService' => 'ZfrCors\\Factory\\CorsServiceFactory',
      'Administrador\\V1\\Rest\\Usuarios\\UsuariosResource' => 'Administrador\\V1\\Rest\\Usuarios\\UsuariosResourceFactory',
    ),
    'aliases' => 
    array (
      'mime_resolver' => 'AssetManager\\Service\\MimeResolver',
      'ZF\\ApiProblem\\ApiProblemListener' => 'ZF\\ApiProblem\\Listener\\ApiProblemListener',
      'ZF\\ApiProblem\\RenderErrorListener' => 'ZF\\ApiProblem\\Listener\\RenderErrorListener',
      'ZF\\ApiProblem\\ApiProblemRenderer' => 'ZF\\ApiProblem\\View\\ApiProblemRenderer',
      'ZF\\ApiProblem\\ApiProblemStrategy' => 'ZF\\ApiProblem\\View\\ApiProblemStrategy',
      'ZF\\OAuth2\\Provider\\UserId' => 'ZF\\OAuth2\\Provider\\UserId\\AuthenticationService',
      'authentication' => 'ZF\\MvcAuth\\Authentication',
      'authorization' => 'ZF\\MvcAuth\\Authorization\\AuthorizationInterface',
      'ZF\\MvcAuth\\Authorization\\AuthorizationInterface' => 'ZF\\MvcAuth\\Authorization\\AclAuthorization',
    ),
    'delegators' => 
    array (
      'ZF\\MvcAuth\\Authentication\\DefaultAuthenticationListener' => 
      array (
        0 => 'ZF\\MvcAuth\\Factory\\AuthenticationAdapterDelegatorFactory',
      ),
    ),
  ),
  'controllers' => 
  array (
    'invokables' => 
    array (
      'Application\\Controller\\Index' => 'Application\\Controller\\IndexController',
    ),
    'factories' => 
    array (
      'ZF\\DevelopmentMode\\DevelopmentModeController' => 'ZF\\DevelopmentMode\\DevelopmentModeControllerFactory',
      'ZF\\Apigility\\Documentation\\Controller' => 'ZF\\Apigility\\Documentation\\ControllerFactory',
      'AssetManager\\Controller\\Console' => 'AssetManager\\Controller\\ConsoleControllerFactory',
      'ZF\\OAuth2\\Controller\\Auth' => 'ZF\\OAuth2\\Factory\\AuthControllerFactory',
    ),
    'abstract_factories' => 
    array (
      0 => 'ZF\\Rest\\Factory\\RestControllerFactory',
      1 => 'ZF\\Rpc\\Factory\\RpcControllerFactory',
    ),
  ),
  'view_manager' => 
  array (
    'display_not_found_reason' => true,
    'display_exceptions' => false,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => '/var/www/tp-serverino/serverino/module/Application/config/../view/layout/layout.phtml',
      'application/index/index' => '/var/www/tp-serverino/serverino/module/Application/config/../view/application/index/index.phtml',
      'error/404' => '/var/www/tp-serverino/serverino/module/Application/config/../view/error/404.phtml',
      'error/index' => '/var/www/tp-serverino/serverino/module/Application/config/../view/error/index.phtml',
      'oauth/authorize' => '/var/www/tp-serverino/serverino/vendor/zfcampus/zf-oauth2/config/../view/zf/auth/authorize.phtml',
      'oauth/receive-code' => '/var/www/tp-serverino/serverino/vendor/zfcampus/zf-oauth2/config/../view/zf/auth/receive-code.phtml',
    ),
    'template_path_stack' => 
    array (
      0 => '/var/www/tp-serverino/serverino/module/Application/config/../view',
      1 => '/var/www/tp-serverino/serverino/vendor/zfcampus/zf-apigility-documentation/config/../view',
      2 => '/var/www/tp-serverino/serverino/vendor/zfcampus/zf-oauth2/config/../view',
    ),
    'strategies' => 
    array (
      0 => 'ViewJsonStrategy',
    ),
  ),
  'console' => 
  array (
    'router' => 
    array (
      'routes' => 
      array (
        'development-disable' => 
        array (
          'options' => 
          array (
            'route' => 'development disable',
            'defaults' => 
            array (
              'controller' => 'ZF\\DevelopmentMode\\DevelopmentModeController',
              'action' => 'disable',
            ),
          ),
        ),
        'development-enable' => 
        array (
          'options' => 
          array (
            'route' => 'development enable',
            'defaults' => 
            array (
              'controller' => 'ZF\\DevelopmentMode\\DevelopmentModeController',
              'action' => 'enable',
            ),
          ),
        ),
        'AssetManager-warmup' => 
        array (
          'options' => 
          array (
            'route' => 'assetmanager warmup [--purge] [--verbose|-v]',
            'defaults' => 
            array (
              'controller' => 'AssetManager\\Controller\\Console',
              'action' => 'warmup',
            ),
          ),
        ),
      ),
    ),
  ),
  'asset_manager' => 
  array (
    'resolver_configs' => 
    array (
      'paths' => 
      array (
        0 => '/var/www/tp-serverino/serverino/vendor/zfcampus/zf-apigility/config/../asset',
      ),
    ),
    'clear_output_buffer' => true,
    'resolvers' => 
    array (
      'AssetManager\\Resolver\\MapResolver' => 3000,
      'AssetManager\\Resolver\\ConcatResolver' => 2500,
      'AssetManager\\Resolver\\CollectionResolver' => 2000,
      'AssetManager\\Resolver\\PrioritizedPathsResolver' => 1500,
      'AssetManager\\Resolver\\AliasPathStackResolver' => 1000,
      'AssetManager\\Resolver\\PathStackResolver' => 500,
    ),
  ),
  'zf-apigility' => 
  array (
    'db-connected' => 
    array (
      'Loja\\V1\\Rest\\Marcas\\MarcasResource' => 
      array (
        'adapter_name' => 'Postgres',
        'table_name' => 'marcas',
        'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
        'controller_service_name' => 'Loja\\V1\\Rest\\Marcas\\Controller',
        'entity_identifier_name' => 'mar_id',
        'table_service' => 'Loja\\V1\\Rest\\Marcas\\MarcasResource\\Table',
      ),
    ),
  ),
  'zf-content-negotiation' => 
  array (
    'controllers' => 
    array (
      'ZF\\Apigility\\Documentation\\Controller' => 'Documentation',
      'ZF\\OAuth2\\Controller\\Auth' => 
      array (
        'ZF\\ContentNegotiation\\JsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
        'Zend\\View\\Model\\ViewModel' => 
        array (
          0 => 'text/html',
          1 => 'application/xhtml+xml',
        ),
      ),
      'Logistica\\V1\\Rest\\Filial\\Controller' => 'HalJson',
      'Logistica\\V1\\Rest\\Estoque\\Controller' => 'HalJson',
      'Loja\\V1\\Rest\\Marcas\\Controller' => 'HalJson',
      'Administrador\\V1\\Rest\\Usuarios\\Controller' => 'HalJson',
    ),
    'accept_whitelist' => 
    array (
      'ZF\\Apigility\\Documentation\\Controller' => 
      array (
        0 => 'application/vnd.swagger+json',
        1 => 'application/json',
      ),
      'Logistica\\V1\\Rest\\Filial\\Controller' => 
      array (
        0 => 'application/vnd.logistica.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'Logistica\\V1\\Rest\\Estoque\\Controller' => 
      array (
        0 => 'application/vnd.logistica.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'Loja\\V1\\Rest\\Marcas\\Controller' => 
      array (
        0 => 'application/vnd.loja.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
      'Administrador\\V1\\Rest\\Usuarios\\Controller' => 
      array (
        0 => 'application/vnd.administrador.v1+json',
        1 => 'application/hal+json',
        2 => 'application/json',
      ),
    ),
    'selectors' => 
    array (
      'Documentation' => 
      array (
        'Zend\\View\\Model\\ViewModel' => 
        array (
          0 => 'text/html',
          1 => 'application/xhtml+xml',
        ),
        'ZF\\Apigility\\Documentation\\JsonModel' => 
        array (
          0 => 'application/json',
        ),
      ),
      'HalJson' => 
      array (
        'ZF\\Hal\\View\\HalJsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
      ),
      'Json' => 
      array (
        'ZF\\ContentNegotiation\\JsonModel' => 
        array (
          0 => 'application/json',
          1 => 'application/*+json',
        ),
      ),
    ),
    'content_type_whitelist' => 
    array (
      'Logistica\\V1\\Rest\\Filial\\Controller' => 
      array (
        0 => 'application/vnd.logistica.v1+json',
        1 => 'application/json',
      ),
      'Logistica\\V1\\Rest\\Estoque\\Controller' => 
      array (
        0 => 'application/vnd.logistica.v1+json',
        1 => 'application/json',
      ),
      'Loja\\V1\\Rest\\Marcas\\Controller' => 
      array (
        0 => 'application/vnd.loja.v1+json',
        1 => 'application/json',
      ),
      'Administrador\\V1\\Rest\\Usuarios\\Controller' => 
      array (
        0 => 'application/vnd.administrador.v1+json',
        1 => 'application/json',
      ),
    ),
  ),
  'view_helpers' => 
  array (
    'invokables' => 
    array (
      'agacceptheaders' => 'ZF\\Apigility\\Documentation\\View\\AgAcceptHeaders',
      'agcontenttypeheaders' => 'ZF\\Apigility\\Documentation\\View\\AgContentTypeHeaders',
      'agservicepath' => 'ZF\\Apigility\\Documentation\\View\\AgServicePath',
      'agstatuscodes' => 'ZF\\Apigility\\Documentation\\View\\AgStatusCodes',
    ),
    'factories' => 
    array (
      'Hal' => 'ZF\\Hal\\Factory\\HalViewHelperFactory',
    ),
  ),
  'zf-api-problem' => 
  array (
  ),
  'zf-configuration' => 
  array (
    'config_file' => 'config/autoload/development.php',
  ),
  'zf-oauth2' => 
  array (
    'grant_types' => 
    array (
      'client_credentials' => true,
      'authorization_code' => true,
      'password' => true,
      'refresh_token' => true,
      'jwt' => true,
    ),
    'api_problem_error_response' => true,
  ),
  'controller_plugins' => 
  array (
    'invokables' => 
    array (
      'getidentity' => 'ZF\\MvcAuth\\Identity\\IdentityPlugin',
      'routeParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParam',
      'queryParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParam',
      'bodyParam' => 'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParam',
      'routeParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\RouteParams',
      'queryParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\QueryParams',
      'bodyParams' => 'ZF\\ContentNegotiation\\ControllerPlugin\\BodyParams',
      'getinputfilter' => 'ZF\\ContentValidation\\InputFilter\\InputFilterPlugin',
    ),
    'factories' => 
    array (
      'Hal' => 'ZF\\Hal\\Factory\\HalControllerPluginFactory',
    ),
  ),
  'zf-mvc-auth' => 
  array (
    'authentication' => 
    array (
      'adapters' => 
      array (
        'oauth2' => 
        array (
          'adapter' => 'ZF\\MvcAuth\\Authentication\\OAuth2Adapter',
          'storage' => 
          array (
            'adapter' => 'pdo',
            'dsn' => 'pgsql:host=localhost;dbname=tuningparts_dev3',
            'route' => '/oauth',
            'username' => 'postgres',
          ),
        ),
      ),
    ),
    'authorization' => 
    array (
      'deny_by_default' => false,
    ),
  ),
  'zf-hal' => 
  array (
    'renderer' => 
    array (
    ),
    'metadata_map' => 
    array (
      'Logistica\\V1\\Rest\\Filial\\FilialEntity' => 
      array (
        'entity_identifier_name' => 'fil_id',
        'route_name' => 'logistica.rest.filial',
        'route_identifier_name' => 'filial_id',
        'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
      ),
      'Logistica\\V1\\Rest\\Filial\\FilialCollection' => 
      array (
        'entity_identifier_name' => 'fil_id',
        'route_name' => 'logistica.rest.filial',
        'route_identifier_name' => 'filial_id',
        'is_collection' => true,
      ),
      'Logistica\\V1\\Rest\\Estoque\\EstoqueEntity' => 
      array (
        'entity_identifier_name' => 'etq_id',
        'route_name' => 'logistica.rest.estoque',
        'route_identifier_name' => 'estoque_id',
        'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
      ),
      'Logistica\\V1\\Rest\\Estoque\\EstoqueCollection' => 
      array (
        'entity_identifier_name' => 'etq_id',
        'route_name' => 'logistica.rest.estoque',
        'route_identifier_name' => 'estoque_id',
        'is_collection' => true,
      ),
      'Loja\\V1\\Rest\\Marcas\\MarcasEntity' => 
      array (
        'entity_identifier_name' => 'mar_id',
        'route_name' => 'loja.rest.marcas',
        'route_identifier_name' => 'marcas_id',
        'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
      ),
      'Loja\\V1\\Rest\\Marcas\\MarcasCollection' => 
      array (
        'entity_identifier_name' => 'id',
        'route_name' => 'loja.rest.marcas',
        'route_identifier_name' => 'marcas_id',
        'is_collection' => true,
      ),
      'Administrador\\V1\\Rest\\Usuarios\\UsuariosEntity' => 
      array (
        'entity_identifier_name' => 'adm_id',
        'route_name' => 'administrador.rest.usuarios',
        'route_identifier_name' => 'usuarios_id',
        'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
      ),
      'Administrador\\V1\\Rest\\Usuarios\\UsuariosCollection' => 
      array (
        'entity_identifier_name' => 'adm_id',
        'route_name' => 'administrador.rest.usuarios',
        'route_identifier_name' => 'usuarios_id',
        'is_collection' => true,
      ),
    ),
    'options' => 
    array (
      'use_proxy' => false,
    ),
  ),
  'filters' => 
  array (
    'aliases' => 
    array (
      'Zend\\Filter\\File\\RenameUpload' => 'filerenameupload',
    ),
    'factories' => 
    array (
      'filerenameupload' => 'ZF\\ContentNegotiation\\Factory\\RenameUploadFilterFactory',
    ),
  ),
  'validators' => 
  array (
    'aliases' => 
    array (
      'Zend\\Validator\\File\\UploadFile' => 'fileuploadfile',
    ),
    'factories' => 
    array (
      'fileuploadfile' => 'ZF\\ContentNegotiation\\Factory\\UploadFileValidatorFactory',
      'ZF\\ContentValidation\\Validator\\DbRecordExists' => 'ZF\\ContentValidation\\Validator\\Db\\RecordExistsFactory',
      'ZF\\ContentValidation\\Validator\\DbNoRecordExists' => 'ZF\\ContentValidation\\Validator\\Db\\NoRecordExistsFactory',
    ),
  ),
  'input_filter_specs' => 
  array (
    'Logistica\\V1\\Rest\\Filial\\Validator' => 
    array (
      0 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '250',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_nome',
      ),
      1 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '500',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_endereco',
      ),
      2 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '15',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_telefone',
      ),
      3 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '18',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_cnpj',
      ),
      4 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '15',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_inscricao_estadual',
      ),
      5 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '2',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_uf',
      ),
      6 => 
      array (
        'required' => false,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '5',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_serie',
      ),
      7 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_status',
      ),
      8 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '100',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_cidade',
      ),
      9 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '9',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_cep',
      ),
      10 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '20',
            ),
          ),
        ),
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
            'options' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
            'options' => 
            array (
            ),
          ),
        ),
        'name' => 'fil_inscricao_municipal',
      ),
      11 => 
      array (
        'required' => false,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'max' => '50',
            ),
          ),
        ),
        'filters' => 
        array (
        ),
        'name' => 'fil_codigo_nf',
      ),
    ),
    'Logistica\\V1\\Rest\\Estoque\\Validator' => 
    array (
      0 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'etq_nome',
      ),
      1 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'etq_localizado',
      ),
      2 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'etq_pertence',
      ),
      3 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'etq_status',
      ),
    ),
    'Loja\\V1\\Rest\\Marca\\Validator' => 
    array (
      0 => 
      array (
        'required' => true,
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\I18n\\Validator\\IsInt',
            'options' => 
            array (
            ),
          ),
        ),
        'filters' => 
        array (
        ),
        'name' => 'mar_id',
        'description' => 'id da marca',
      ),
    ),
    'Loja\\V1\\Rest\\Marcas\\Validator' => 
    array (
      0 => 
      array (
        'name' => 'mar_id',
        'required' => true,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      1 => 
      array (
        'name' => 'mar_description',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => NULL,
            ),
          ),
        ),
      ),
      2 => 
      array (
        'name' => 'mar_keywords',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      3 => 
      array (
        'name' => 'mar_texto',
        'required' => false,
        'filters' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Filter\\StringTrim',
          ),
          1 => 
          array (
            'name' => 'Zend\\Filter\\StripTags',
          ),
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'Zend\\Validator\\StringLength',
            'options' => 
            array (
              'min' => 1,
              'max' => NULL,
            ),
          ),
        ),
      ),
      4 => 
      array (
        'name' => 'mar_url',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      5 => 
      array (
        'name' => 'fab_id',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
          0 => 
          array (
            'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
            'options' => 
            array (
              'adapter' => 'Postgres',
              'table' => 'fabricante',
              'field' => 'fab_id',
            ),
          ),
        ),
      ),
      6 => 
      array (
        'name' => 'mar_nome',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      7 => 
      array (
        'name' => 'mar_status',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      8 => 
      array (
        'name' => 'mar_banner_alt',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      9 => 
      array (
        'name' => 'mar_logo_alt',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      10 => 
      array (
        'name' => 'mar_title',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      11 => 
      array (
        'name' => 'mar_destaque',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
      12 => 
      array (
        'name' => 'mar_destaque_menu',
        'required' => false,
        'filters' => 
        array (
        ),
        'validators' => 
        array (
        ),
      ),
    ),
    'Administrador\\V1\\Rest\\Usuarios\\Validator' => 
    array (
      0 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'adm_login',
      ),
      1 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'adm_senha',
      ),
      2 => 
      array (
        'required' => true,
        'validators' => 
        array (
        ),
        'filters' => 
        array (
        ),
        'name' => 'adm_ip',
      ),
    ),
  ),
  'input_filters' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\InputFilter\\InputFilterAbstractServiceFactory',
    ),
  ),
  'zf-content-validation' => 
  array (
    'methods_without_bodies' => 
    array (
    ),
    'Logistica\\V1\\Rest\\Filial\\Controller' => 
    array (
      'input_filter' => 'Logistica\\V1\\Rest\\Filial\\Validator',
    ),
    'Logistica\\V1\\Rest\\Estoque\\Controller' => 
    array (
      'input_filter' => 'Logistica\\V1\\Rest\\Estoque\\Validator',
    ),
    'Loja\\V1\\Rest\\Marcas\\Controller' => 
    array (
      'input_filter' => 'Loja\\V1\\Rest\\Marcas\\Validator',
    ),
    'Administrador\\V1\\Rest\\Usuarios\\Controller' => 
    array (
      'input_filter' => 'Administrador\\V1\\Rest\\Usuarios\\Validator',
    ),
  ),
  'zf-rest' => 
  array (
    'Logistica\\V1\\Rest\\Filial\\Controller' => 
    array (
      'listener' => 'Logistica\\V1\\Rest\\Filial\\FilialResource',
      'route_name' => 'logistica.rest.filial',
      'route_identifier_name' => 'filial_id',
      'collection_name' => 'filial',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
        0 => 'fil_nome',
        1 => 'fil_endereco',
        2 => 'fil_telefone',
        3 => 'fil_cnpj',
        4 => 'fil_inscricao_estadual',
        5 => 'fil_uf',
        6 => 'fil_serie',
        7 => 'fil_status',
        8 => 'fil_id',
        9 => 'sort',
        10 => 'ord',
        11 => 'busca',
      ),
      'page_size' => '10',
      'page_size_param' => 'l',
      'entity_class' => 'Logistica\\V1\\Rest\\Filial\\FilialEntity',
      'collection_class' => 'Logistica\\V1\\Rest\\Filial\\FilialCollection',
      'service_name' => 'Filial',
    ),
    'Logistica\\V1\\Rest\\Estoque\\Controller' => 
    array (
      'listener' => 'Logistica\\V1\\Rest\\Estoque\\EstoqueResource',
      'route_name' => 'logistica.rest.estoque',
      'route_identifier_name' => 'estoque_id',
      'collection_name' => 'estoque',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
        0 => 'sort',
        1 => 'ord',
        2 => 'busca',
        3 => 'etq_id',
      ),
      'page_size' => '10',
      'page_size_param' => 'l',
      'entity_class' => 'Logistica\\V1\\Rest\\Estoque\\EstoqueEntity',
      'collection_class' => 'Logistica\\V1\\Rest\\Estoque\\EstoqueCollection',
      'service_name' => 'Estoque',
    ),
    'Loja\\V1\\Rest\\Marcas\\Controller' => 
    array (
      'listener' => 'Loja\\V1\\Rest\\Marcas\\MarcasResource',
      'route_name' => 'loja.rest.marcas',
      'route_identifier_name' => 'marcas_id',
      'collection_name' => 'marcas',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
      ),
      'page_size' => 25,
      'page_size_param' => NULL,
      'entity_class' => 'Loja\\V1\\Rest\\Marcas\\MarcasEntity',
      'collection_class' => 'Loja\\V1\\Rest\\Marcas\\MarcasCollection',
      'service_name' => 'marcas',
    ),
    'Administrador\\V1\\Rest\\Usuarios\\Controller' => 
    array (
      'listener' => 'Administrador\\V1\\Rest\\Usuarios\\UsuariosResource',
      'route_name' => 'administrador.rest.usuarios',
      'route_identifier_name' => 'usuarios_id',
      'collection_name' => 'usuarios',
      'entity_http_methods' => 
      array (
        0 => 'GET',
        1 => 'PATCH',
        2 => 'PUT',
        3 => 'DELETE',
      ),
      'collection_http_methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
      ),
      'collection_query_whitelist' => 
      array (
        0 => 'adm_senha',
        1 => 'adm_login',
      ),
      'page_size' => '10',
      'page_size_param' => 'l',
      'entity_class' => 'Administrador\\V1\\Rest\\Usuarios\\UsuariosEntity',
      'collection_class' => 'Administrador\\V1\\Rest\\Usuarios\\UsuariosCollection',
      'service_name' => 'Usuarios',
    ),
  ),
  'zf-rpc' => 
  array (
  ),
  'zf-versioning' => 
  array (
    'content-type' => 
    array (
    ),
    'default_version' => 1,
    'uri' => 
    array (
      0 => 'logistica.rest.filial',
      1 => 'logistica.rest.estoque',
      2 => 'loja.rest.marcas',
      3 => 'administrador.rest.usuarios',
    ),
  ),
  'zfr_cors' => 
  array (
    'allowed_origins' => 
    array (
      0 => 'http://tp-homer',
    ),
    'allowed_methods' => 
    array (
      0 => 'GET',
      1 => 'POST',
      2 => 'PUT',
      3 => 'PATCH',
      4 => 'DELETE',
    ),
    'allowed_headers' => 
    array (
      0 => 'Authorization',
      1 => 'Content-Type',
    ),
  ),
  'db' => 
  array (
    'adapters' => 
    array (
      'Postgres' => 
      array (
        'database' => 'tuningparts_dev3',
        'driver' => 'Pgsql',
        'hostname' => '192.168.10.100',
        'username' => 'postgres',
        'port' => '1000',
      ),
    ),
  ),
);