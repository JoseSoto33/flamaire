<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Ajuste extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "ajustes";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_editado';

    const ARR_AVOID = [
        'pg_general_pricing',
        'pg_general_payment',
        'pg_general_min',
        'pg_general_max',
        'pg_general_divisa',
        'pg_general_divisa_iso',
        'pg_general_divisa_simbolo',
        'pg_general_divisa_moneda',
        'pg_general_num_cards'
    ];
    const REPLACE_CATEGORY = '<categoria>';
    const REPLACE_SERVICE = '<servicio>';
    const REPLACE_DISPOSAL = '<disposicion>';
    const REPLACE_APPARIENCE = '<apariencia>';
    const REPLACE_SCHEDULE = '<horario>';
    const REPLACE_PAYMENT_METHOD = '<forma-pago>';
    const REPLACE_REGION = '<ciudad>';
    const REPLACE_ZONE = '<zona>';

    const DEFAULT_CATEGORY = 'pg_categorias';
    const DEFAULT_SERVICE = 'pg_servicios';
    const DEFAULT_ESP_SERVICE = 'pg_serv_especiales';
    const DEFAULT_DISPOSAL = 'pg_disposiciones';
    const DEFAULT_APPARIENCE = 'pg_desc_fisica';
    const DEFAULT_SCHEDULE = 'pg_horarios';
    const DEFAULT_PAYMENT_METHOD = 'pg_medios_pago';
    const DEFAULT_CITY = 'pg_regiones_estados_departamentos';
    const DEFAULT_CAT_CITY = 'pg_cat_regiones_estados_departamentos';
    const DEFAULT_ZONE = 'pg_ciudades_zonas';
    const DEFAULT_CAT_CITY_ZONE = 'pg_cat_ciudades_zonas';

    /**
     * Returns the page's text default values
     *
     * @param string $page
     * @param boolean $admin
     * @return mixed
     */
    static function getDefaults($page = 'pg_general', $admin = false) {
        $query = parent::where('campo', 'LIKE', $page.'_%')->where('status',true);
        $search = ["[[", "]]"];
        $replace = ["<span class=\"bold_pink\">", "</span>"];

        if ($query->exists()) {
            $defaults_db = $query->get();
            foreach ($defaults_db as $key => $row) {
                if (!in_array($row->campo, self::ARR_AVOID)) {
                    if ($admin) $return[$row->campo] = $row->valor;
                    else $return[$row->campo] = str_replace($search, $replace, $row->valor);
                }
            }
        }

        if (isset($return) && !empty($return))
            return $return;
        else if ($page != 'pg_general')
            return self::getDefaults();
        else
            return [];
    }

    /**
     * Returns the page's text default values
     *
     * @param string $page
     * @return mixed
     */
    static function getMinMax() {
        $defaults_db = parent::where('campo', 'LIKE', '%_min')
                        ->orWhere('campo', 'LIKE', '%_max')
                        ->get();
        foreach ($defaults_db as $key => $row) {
            $return[$row->campo] = $row->valor;
        }
        return $return ?? [];
    }

    /**
     * Returns the default currency
     *
     * @return mixed
     */
    static function getCurrency() {
        $defaults_db = parent::where('campo', 'LIKE', '%_divisa_%')
                        ->get();
        foreach ($defaults_db as $key => $row) {
            $return[$row->campo] = $row->valor;
        }
        return $return ?? [];
    }

    /**
     * Returns the Payment system status
     *
     * @return mixed
     */
    static function getPaymentStatus() {
        $default_db = parent::where('campo', 'pg_general_payment');
        if ($default_db->exists())
            return $default_db->value('valor') == 'activo';
        else
            return false;
    }

    /**
     * Returns the Pricing system status
     *
     * @return mixed
     */
    static function getPricingStatus() {
        $default_db = parent::where('campo', 'pg_general_pricing');
        if ($default_db->exists())
            return $default_db->value('valor') == 'activo';
        else
            return false;
    }

    /**
     * Returns the default number of announcement cards allowed
     *
     * @return mixed
     */
    static function getNumCards() {
        $default_db = parent::where('campo', 'pg_general_num_cards');
        if ($default_db->exists())
            return ['pg_general_num_cards' => $default_db->value('valor')];
        else
            return ['pg_general_num_cards' => 20];
    }

    /**
     * Returns the default number of announcement cards allowed
     *
     * @return mixed
     */
    static function getCommentsLimit() {
        $default_db = parent::where('campo', 'pg_comments_limit');
        if ($default_db->exists())
            return ['pg_comments_limit' => $default_db->value('valor')];
        else
            return ['pg_comments_limit' => 6];
    }

    /**
     * Returns the essencial data to display a view
     *
     * @param string $page
     * @return mixed
     */
    static function getGeneralData($page = 'pg_general') {
        // $carbon = new \Carbon\Carbon();
        // $anuncio = new Anuncio;
        // $ids_favoritos = self::obtenerIdsAnunciosFavoritos();
        // $isVerified = self::edadVerificada();
        // $fecha = $carbon::parse(date('Y-m-d'))->locale('es')->isoFormat('D \d\e MMMM \d\e\l Y');
        // $usuarios_verificados = DB::table('usuarios')->whereNotNull('email_verified_at')->where([['verificado', '=', true], ['rol','<>', 'admin'], ['status', '=', true]])->count();
        // $paises = DB::table('paises')->get();
        // $categorias = DB::table('categorias')->whereNull('id_categoria_padre')->whereRaw('status = true')->get();
        // $subcategorias = DB::table('categorias')->whereNotNull('id_categoria_padre')->whereRaw('status = true')->get();
        // $regiones = DB::table('regiones_estados_departamentos')->where('status',true)->orderBy('nombre', 'asc')->get();
        // $regiones_bucador = Region::obtenerRegionesBuscador();
        // $apariencia = DB::table('descripcion_fisica')->where('status',true)->get();
        // $horarios = DB::table('horarios')->where('status',true)->get();
        // $formas_pago = DB::table('formas_pago')->where('status',true)->get();
        // $disposicion = DB::table('disposicion')->where('status',true)->get();
        // $servicios = DB::table('servicios')->where('status',true)->where('especial',false)->get();
        // $servicios_especiales = DB::table('servicios')->where('status',true)->where('especial',true)->get();
        $defaults = self::getMinMax();
        $defaultCurrency = self::getCurrency();
        $defaultNumCards = self::getNumCards();
        $paymentSystemStatus = self::getPaymentStatus();
        $pricingSystemStatus = self::getPricingStatus();
        $defaultText = self::getDefaults($page);
        $fullCategories = [];
        $cont = 1;
        // $cantidadAnuncios = $anuncio->cantidadAnunciosActivos();

        // if ($cantidadAnuncios && $cantidadAnuncios >= 10) {
        //     $divisor = '1';
        //     for ($i=0; $i < strlen((string) $cantidadAnuncios) - 1; $i++) {
        //         $divisor .= "0";
        //     }

        //     $cantidad_anuncios = floor($cantidadAnuncios / intval($divisor)) * intval($divisor);
        // } else {
        //     $cantidad_anuncios = $cantidadAnuncios ?? 0;
        // }

        // foreach ($categorias as $key => $categoria) {
        //     $subCategoria = DB::table('categorias')->where('id_categoria_padre', $categoria->id)->whereRaw('status = true')->get();
        //     $fullCategories[] = [
        //         'categoria' => $categoria,
        //         'subcategorias' => $subCategoria,
        //         'img' => !is_null($categoria->imagen)? asset(config('variables.app_values.URL_TO_IMG') . $categoria->imagen) : asset(config('variables.app_values.URL_TO_IMG') . "category" . $cont++ . ".png")
        //     ];
        // }

        return [
            // 'dispositivo' => (Agent::isDesktop())? "ordenador" : "movil-tablet",
            'page_defaults' => $page,
            'defaults' => $defaults,
            // 'ids_favoritos' => $ids_favoritos,
            // 'isVerified' => $isVerified,
            // 'fecha_actual' => $fecha,
            'defaultCurrency' => $defaultCurrency,
            'defaultNumCards' => $defaultNumCards,
            'defaultText' => $defaultText,
            'paymentSystemStatus' => $paymentSystemStatus,
            'pricingSystemStatus' => $pricingSystemStatus,
            // 'categorias' => $categorias,
            // 'subcategorias' => $subcategorias,
            'fullCategories' => $fullCategories,
            // 'usuarios_verificados' => $usuarios_verificados,
            // 'paises' => $paises,
            // 'regiones' => $regiones,
            // 'regiones_bucador' => $regiones_bucador,
            // 'apariencias' => $apariencia,
            // 'horarios' => $horarios,
            // 'formas_pago' => $formas_pago,
            // 'disposiciones' => $disposicion,
            // 'servicios' => $servicios,
            // 'cantidad_anuncios' => $cantidad_anuncios,
            // 'servicios_especiales' => $servicios_especiales
        ];
    }

    static function edadVerificada () {
        $isVerified = Auth::check() || (!empty($_COOKIE['ageVerified']) && $_COOKIE['ageVerified']);
        return $isVerified ?? false;
    }

    /**
     * Retorna el texto con las palabras encerradas entre [[]] resaltadas
     * en negrita y con otro color.
     *
     * @return string
     */
    public function formatedText() 
    {
        $search = ["[[", "]]"];
        $replace = ["<span class=\"font-bold text-primary-600\">", "</span>"];
        return str_replace($search, $replace, nl2br($this->valor));
    }
}
