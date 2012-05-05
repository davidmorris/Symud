<?php

/**
 * Symud is a RightMove BLM builder and parser
 *
 * @author David Morris & Jack Hannigan Popp
 */
class Symud {
    
    /**
     * START STATIC VARIABLES FOR RIGHTMOVE DEFINITIONS AND FIELDS 
     */
    
    /**
     * Static array for some of RightMove's custom field data
     * @var array 
     */
    protected static $rightmove_custom_fields = array(
            'STATUS_ID' => array(
                    "Available",
                    "SSTC (Sales only)",
                    "SSTCM(Scottish Sales only)",
                    "Under Offer (Sales only)",
                    "Reserved (Lettings only)",
                    "Let Agreed (Lettings only)"
            ),
            'PRICE_QUALIFIER' => array(
                    0 => "Default",
                    1 => "POA",
                    2 => "Guide Price",
                    3 => "Fixed Price",
                    4 => "Offers in Excess of",
                    5 => "OIRO",
                    6 => "Sale by Tender",
                    7 => "From",
                    9 => "Shared Ownership",
                    10 => "Offers Over",
                    11 => "Part Buy Part Rent",
                    12 => "Shared Equity"
            ),
            'PUBLISHED_FLAG' => array(
                    0 => "Hidden/invisible", 
                    1 => "Visible"
            ),
            'LET_TYPE_ID' => array(
                    0 => "Not Specified", 
                    1 => "Long Term", 
                    2 => "Short Term", 
                    3 => "Student", 
                    4 => "Commercial"
            ),
            'LET_FURN_ID' => array(
                    0 => "Furnished", 
                    1 => "Part Furnished", 
                    2 => "Unfurnished", 
                    3 => "Not Specified", 
                    4 => "Furnished/Un Furnished"
            ),
            'LET_RENT_FREQUENCY' => array(
                    0 => "Weekly", 
                    1 => "Monthly", 
                    2 => "Quarterly", 
                    3 => "Annual"
            ),
            'TENURE_TYPE_ID' => array(
                    1 => "Freehold", 
                    2 => "Leasehold", 
                    3 => "Feudal", 
                    4 => "Commonhold", 
                    5 => "Share of Freehold"
            ),
            'TRANS_TYPE_ID' => array(
                    1 => "Resale", 
                    2 => "Lettings"
            ),
            'NEW_HOME_FLAG' => array(
                    "Y" => "New Home", 
                    "N" => "Non New Home"
            ),
            'PROP_SUB_ID' => array(
                    0=>"Not Specified",
                    1=>"Terraced",
                    2=>"End of Terrace",
                    3=>"Semi-Detached",
                    4=>"Detached",
                    5=>"Mews",
                    6=>"Cluster House",
                    7=>"Ground Flat",
                    8=>"Flat",
                    9=>"Studio",
                    10=>"Ground Maisonette",
                    11=>"Maisonette",
                    12=>"Bungalow",
                    13=>"Terraced Bungalow",
                    14=>"Semi-Detached Bungalow",
                    15=>"Detached Bungalow",
                    16=>"Mobile Home",
                    17=>"Hotel",
                    18=>"Guest House",
                    19=>"Commercial Property",
                    20=>"Land",
                    21=>"Link Detached House",
                    22=>"Town House",
                    23=>"Cottage",
                    24=>"Chalet",
                    27=>"Villa",
                    28=>"Apartment",
                    29=>"Penthouse",
                    30=>"Finca",
                    43=>"Barn Conversion",
                    44=>"Serviced Apartments",
                    45=>"Parking",
                    46=>"Sheltered Housing",
                    47=>"Retirement Property",
                    48=>"House Share",
                    49=>"Flat Share",
                    50=>"Park Home",
                    51=>"Garages",
                    52=>"Farm House",
                    53=>"Equestrian",
                    56=>"Duplex",
                    59=>"Triplex",
                    62=>"Longere",
                    65=>"Gite",
                    68=>"Barn",
                    71=>"Trulli",
                    74=>"Mill",
                    77=>"Ruins",
                    80=>"Restaurant",
                    83=>"Cafe",
                    86=>"Mill",
                    89=>"Trulli",
                    92=>"Castle",
                    95=>"Village House",
                    101=>"Cave House",
                    104=>"Cortijo",
                    107=>"Farm Land",
                    110=>"Plot",
                    113=>"Country House",
                    116=>"Stone House",
                    117=>"Caravan",
                    118=>"Lodge",
                    119=>"Log Cabin",
                    120=>"Manor House",
                    121=>"Stately Home",
                    125=>"Off-Plan",
                    128=>"Semi-detached Villa",
                    131=>"Detached Villa",
                    134=>"Bar",
                    137=>"Shop",
                    140=>"Riad",
                    141=>"House Boat",
                    142=>"Hotel Room"
            )
    );
    
    /**
     * Static array of all the definitions used by RightMove's blm file.
     * Each field has a type and if applicable, a max length of characters and 
     * a flag if it is a required field.
     * @var array 
     */
    protected static $rightmove_definitions = array (
        'AGENT_REF' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => TRUE,
        ),
        'ADDRESS_1' => 
        array (
            'type' => 'string',
            'len' => '60',
            'is_required' => TRUE,
        ),
        'ADDRESS_2' => 
        array (
            'type' => 'string',
            'len' => '60',
            'is_required' => TRUE,
        ),
        'ADDRESS_3' => 
        array (
            'type' => 'string',
            'len' => '60',
            'is_required' => FALSE,
        ),
        'ADDRESS_4' => 
        array (
            'type' => 'string',
            'len' => '60',
            'is_required' => FALSE,
        ),
        'TOWN' => 
        array (
            'type' => 'string',
            'len' => '60',
            'is_required' => TRUE,
        ),
        'POSTCODE1' => 
        array (
            'type' => 'string',
            'len' => '10',
            'is_required' => TRUE,
        ),
        'POSTCODE2' => 
        array (
            'type' => 'string',
            'len' => '10',
            'is_required' => TRUE,
        ),
        'FEATURE1' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => TRUE,
        ),
        'FEATURE2' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => TRUE,
        ),
        'FEATURE3' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => TRUE,
        ),
        'FEATURE4' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE5' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE6' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE7' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE8' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE9' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'FEATURE10' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'SUMMARY' => 
        array (
            'type' => 'string',
            'len' => '1000',
            'is_required' => TRUE,
        ),
        'DESCRIPTION' => 
        array (
            'type' => 'string',
            'len' => '32000',
            'is_required' => TRUE,
        ),
        'BRANCH_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'STATUS_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'BEDROOMS' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'BATHROOMS' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LIVING_ROOMS' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'PRICE' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'PRICE_QUALIFIER' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'PROP_SUB_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'CREATE_DATE' => 
        array (
            'type' => 'date',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'UPDATE_DATE' => 
        array (
            'type' => 'date',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'DISPLAY_ADDRESS' => 
        array (
            'type' => 'string',
            'len' => '120',
            'is_required' => TRUE,
        ),
        'PUBLISHED_FLAG' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'LET_DATE_AVAILABLE' => 
        array (
            'type' => 'date',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_BOND' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_TYPE_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_FURN_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_RENT_FREQUENCY' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_CONTRACT_IN_MONTHS' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'LET_WASHING_MACHINE_FLAG' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_DISHWASHER_FLAG' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BURGLAR_ALARM_FLAG' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_WATER' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_GAS' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_ELECTRICITY' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_TV_LICENCE' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_TV_SUBSCRIPTION' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'LET_BILL_INC_INTERNET' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'TENURE_TYPE_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'TRANS_TYPE_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => TRUE,
        ),
        'MIN_SIZE_ENTERED' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'MAX_SIZE_ENTERED' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'AREA_SIZE_UNIT_ID' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'BUSINESS_FOR_SALE_FLAG' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'PRICE_PER_UNIT' => 
        array (
            'type' => 'int',
            'len' => NULL,
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_1' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_2' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_3' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_4' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_5' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'COMM_CLASS_ORDER_6' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'NEW_HOME_FLAG' => 
        array (
            'type' => 'string',
            'len' => '1',
            'is_required' => FALSE,
        ),
        'MEDIA_IMAGE_XX' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => TRUE,
        ),
        'MEDIA_IMAGE_TEXT_XX' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_IMAGE_60' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_IMAGE_TEXT_60' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_FLOOR_PLAN_XX' => 
        array (
            'type' => 'string',
            'len' => '100',
            'is_required' => FALSE,
        ),
        'MEDIA_FLOOR_PLAN_TEXT_XX' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_DOCUMENT_XX' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'MEDIA_DOCUMENT_TEXT_XX' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_DOCUMENT_50' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'MEDIA_DOCUMENT_TEXT_50' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        ),
        'MEDIA_VIRTUAL_TOUR_XX' => 
        array (
            'type' => 'string',
            'len' => '200',
            'is_required' => FALSE,
        ),
        'MEDIA_VIRTUAL_TOUR_TEXT_XX' => 
        array (
            'type' => 'string',
            'len' => '20',
            'is_required' => FALSE,
        )
    );
    
    protected static $repeated_media = array(
	'MEDIA_IMAGE', 
	'MEDIA_FLOOR_PLAN',  
	'MEDIA_DOCUMENT', 
	'MEDIA_VIRTUAL_TOUR' 
    );
    
    protected static $verison = 3;
    
    // Regex used for finding media with trailing int
    protected static $media_regex = '/MEDIA_(IMAGE|IMAGE_TEXT|
	FLOORPLAN|FLOORPLAN_TEXT|DOCUMENT|DOCUMENT_TEXT|
	VIRTUAL_TOUR|VIRTUAL_TOUR_TEXT)_\d+/';
    protected static $special_media_regex = '/(MEDIA_IMAGE_60|MEDIA_IMAGE_TEX_60|
	MEDIA_DOCUMENT_50|MEDIA_DOCUMENT_TEXT_50)/';
    
    /**
     * END OF STATIC VARIABLES 
     */
    
    private $_branch_id                 = '99xx99';	// Default branch id
    private $_eof                       = '^';		// End of Field delim
    private $_eor                       = '~';		// End of Record delim
    private $_definitions		= array();	// Definitions used
    private $_definitions_validation	= array();	// Definitions validation array
    private $_requireds			= array();	// Required definitions
    
    private $_properties                = array();	// Holds properties
    private $_num_of_properties         = 0;
    
    private $_max_media_image_num	= 1; // Default requires one image
    private $_max_media_floor_plan_num	= 0;
    private $_max_media_document_num	= 0;
    private $_max_media_virtual_tour_num	= 0;
    
    public function __construct($branch_id, $eof = '^', $eor = '~', $time_zone = 'Europe/London') 
    {
        $this->_branch_id = $branch_id;
        $this->_eof = $eof;
	$this->_eor = $eor;
	
	// Set the timezone for date generation
	date_default_timezone_set($time_zone);
	
	$this->_init_keys()->_init_requireds();
    }
    
    public function get_branch_id()
    {
	return $this->_branch_id;
    }

    public function set_branch_id($_branch_id)
    {
	$this->_branch_id = $_branch_id;
	
	return $this;
    }

    public function get_eof()
    {
	return $this->_eof;
    }

    public function set_eof($_eof)
    {
	$this->_eof = $_eof;
	
	return $this;
    }

    public function get_eor()
    {
	return $this->_eor;
    }

    public function set_eor($_eor)
    {
	$this->_eor = $_eor;
	
	return $this;
    }

    public function get_definitions()
    {
	return $this->_definitions;
    }

    public function get_requireds()
    {
	return $this->_requireds;
    }
    
    public function get_num_of_properties()
    {
	return $this->_num_of_properties;
    }

    public function get_max_images_num()
    {
	return $this->_max_media_image_num;
    }

    public function get_max_floorplans_num()
    {
	return $this->_max_media_floor_plan_num;
    }

    public function get_max_documents_num()
    {
	return $this->_max_media_document_num;
    }
    
    public function get_max_virtual_num()
    {
	return $this->_max_media_virtual_tour_num;
    }

    /**
     * Adds a property, santises it and validates it first.
     * 
     * @param array $property
     * @return int the property number 
     */    
    public function add_property($id, $data)
    {
	// Add branch ids and references etc
	$property = array(
	    'AGENT_REF'	=> $this->_branch_id.'_'.$id,
	    'BRANCH_ID' => $this->_branch_id
	);
	
	$property = array_merge($property, $data);
	
	$this->_sanitise_property($property)->_check_for_requireds($property)
		->_validate_property($property)//->_media_count($property)
		->_build_definitions($property);
	
	$this->_properties[$id] = $property;
	
	return ++$this->_num_of_properties;
    }
    
    /**
     * Builds a RightMove BLM file using the properties provided.
     * 
     * @return string 
     */
    public function build()
    {
	$build = $this->_header().$this->_definitions().$this->_data().'#END#';
	
	return $build;
    }
    
    
    /**
     * Load properties from database
     * Recursively add to the $rightmove_fields array.
     * @return array
     */
    public function load_properties()
    {
        
    }
    
    /**
     * Scrape property image folder.
     * Rename and copy to property media folder.
     * Naming structure <AGENT_REF>_<MEDIA_TYPE>_<n>.<file exentsion>
     * <AGENT_REF> - bramd Od and property reference
     * <MDIA_TYPE> - IMG = property image, FLP = floor plan, DOC = docs and brochure
     * <n> - index number start from 00 to sequence the media
     * <file extension> - Acceptable file types - .jpg, .png, .gif
     */
    
    public function load_images($source_directory,$branch_id,$destination_directory)
    {
        
    }
    
    /**
     * Scrape floor plan folder.
     * Rename and copy to property media folder.
     * Naming structure <AGENT_REF>_<MEDIA_TYPE>_<n>.<file exentsion>
     * <AGENT_REF> - bramd Od and property reference
     * <MDIA_TYPE> - IMG = property image, FLP = floor plan, DOC = docs and brochure
     * <n> - index number start from 00 to sequence the media
     * <file extension> - Acceptable file types - .jpg, .png, .gif
     */
    public function load_flp($source_directory,$branch_id,$destination_directory)
    {
        
    }
    
    /**
     * Scrape documents/brouchure folder.
     * Rename and copy to propery media folder.
     * Naming structure <AGENT_REF>_<MEDIA_TYPE>_<n>.<file exentsion>
     * <AGENT_REF> - bramd Od and property reference
     * <MDIA_TYPE> - IMG = property image, FLP = floor plan, DOC = docs and brochure
     * <n> - index number start from 00 to sequence the media
     * <file extension> - Acceptable file types - .pdf
     */
    public function load_doc($source_directory,$branch_id,$destination_directory)
    {
        
    }
    
    
    /**
     * Creates a ZIP file of the media for upload.
     * Naming structure <BRANCH_ID>.ZIP
     */
    
    public function create_media_zip($source_directory,$branch_id,$destination_directory)
    {
        
    }
    
    /**
     * Writes the BLM file
     * Naming structure <BRANCH_ID>_<YYYY><MM><DD><SEQ NO>.BLM
     * @return type boolean 
     */
    public function blm_out($source_directory,$branch_id,$destination_directory)
    {
        $date_year;
        $date_month;
        $date_day;
        return $success();    
    }
    
    
    /**
     * Initialise the definitions array, replacing xx with 00 where needed
     * @return \Symud 
     */
    private function _init_keys()
    {
	$this->_definitions_validation = array_keys(self::$rightmove_definitions);
	$m = count($this->_definitions_validation);
	for($i = 0; $i < $m; $i++)
	    $this->_definitions_validation[$i] = str_replace ('_XX','_00', $this->_definitions_validation[$i]);
	
	return $this;
    }
    
    /**
     * Initialise the array of required fields for any blm file
     * @return \Symud 
     */
    private function _init_requireds()
    {
	foreach(self::$rightmove_definitions as $key => $data)
	    if($data['is_required'] === TRUE)
		$this->_requireds[] = str_replace ('_XX', '_00', $key);
	
	return $this;
    }
    
    /**
     * Cleans a property array so that only rightmove definitions are used.
     * 
     * @param array $property
     * @return \Symud
     * @throws EmptyPropertyDataException 
     */
    private function _sanitise_property(&$property)
    {
	$return = array();
	foreach($property as $key => $val)
	{
	    //check if we have a key in our definitions
	    if(in_array($key, $this->_definitions_validation) || preg_match(self::$media_regex, $key))
		$return[$key] = $val;
	}
	
	// If there are no valid definitions, throw exception
	if(!count($property))
	    throw new EmptyPropertyDataException;
	
	$property = $return;
	
	return $this;
    }
    
    /**
     * Checks that all required fields are used in the property
     * @param array $property
     * @return \Symud
     * @throws MissingRequiredFieldsException 
     */
    private function _check_for_requireds(&$property)
    {
	foreach($this->_requireds as $req)
	    if(!array_key_exists($req, $property) && strlen(trim($property[$req])))
		    throw new MissingRequiredFieldsException($req);
	return $this;
    }
    
    /**
     * Validates a property's data. Checks the required data type, the length 
     * of data. If the field has custom field data, @see self::$rightmove_custom_fields, 
     * then this is checked against too.
     * 
     * @param array $property
     * @return \Symud
     * @throws PropertyFieldTooBig
     * @throws PropertyFieldNotInteger
     * @throws PropertyFieldNotCharacter
     * @throws InvalidRightMoveFieldData 
     */
    private function _validate_property(&$property)
    {
	foreach($property as $key => $val)
	{
	    if(isset(self::$rightmove_definitions[$key]))
	    {
		// Test field doesn't exceed max length
		$el = self::$rightmove_definitions[$key];
		if($el['len'] > 0 && strlen($val) > $el['len'])
		    throw new PropertyFieldTooBig($key);
		
		// Test field is a valid integer or digit for integer data type
		if($el['type'] == 'int' && !is_integer($val) && !ctype_digit($val)
			&& ($key == 'BRANCH_ID' && $val != '99xx99'))
		    throw new PropertyFieldNotInteger($key, $val);

		else if(!strlen(trim($val))) // For string fields, just check they're not empty
		    throw new PropertyFieldNotCharacter($key, $val);
		
		// Check against RightMove's custom fields
		if(isset(self::$rightmove_custom_fields[$key]) && 
			!isset(self::$rightmove_custom_fields[$key][$val]))
		    throw new InvalidRightMoveFieldData($key, $val);
	    }
	}
	
	return $this;
    }
    
    /**
     * Counts the maximum amount of each media. Since all BLM records must have 
     * the same number of data entries.
     * 
     * @param array $property
     * @return \Symud 
     */
    private function _media_count(&$property)
    {
	$keys = array_keys($property);
	$this->_max_media_image_num = max(count(preg_grep('/MEDIA_IMAGE_\d+/', $keys)), $this->_max_media_image_num);
	$this->_max_media_document_num = max(count(preg_grep('/MEDIA_DOCUMENT_\d+/', $keys)), $this->_max_media_document_num);
	$this->_max_media_floor_plan_num = max(count(preg_grep('/MEDIA_FLOOR_PLAN_\d+/', $keys)), $this->_max_media_floor_plan_num);
	$this->_max_media_virtual_tour_num = max(count(preg_grep('/MEDIA_VIRTUAL_TOUR_\d+/', $keys)), $this->_max_media_virtual_tour_num);
	
	return $this;
    }
    
    
    private function _build_definitions(&$property)
    {
	$this->_definitions = array_merge($this->_definitions, $property);
	foreach($this->_definitions as $k => $v)
	    $this->_definitions[$k] = '';
	return $this;
    }
    
    /**
     * Generates the #HEADER# portion of a blm file
     * @return string 
     */
    private function _header()
    {
	$return = "#HEADER#\nVersion: %s\nEOF: '%s'\nEOR: '%s'\nProperty Count: %d\nGenerated Date: %s\n\n";
	
	$return = sprintf($return, self::$verison, $this->_eof, $this->_eor, 
		$this->_num_of_properties, date('d-M-Y H:i'));
	
	return $return;
    }
    
    /**
     * Generates the #DEFINITION# portion of a blm file
     * @return string 
     */
    private function _definitions()
    {
	return "#DEFINITION#\n".implode('^',array_keys($this->_definitions)).$this->_eof.$this->_eor."\n\n";
    }
    
    /**
     * Generates the #DATA# portion of a blm file
     * @return string 
     */
    private function _data()
    {
	$record = "#DATA#\n";
	foreach($this->_properties as $property)
	    $record .= $this->_to_string($property)."\n\n";
	
	return $record."\n\n";
    }
    
    /**
     * Turns a single property into a blm formatted record
     * 
     * @param array $property
     * @return string 
     */
    private function _to_string($property)
    {
	$record = '';
	foreach($this->_definitions as $k => $v)
	    $record .= ((isset($property[$k])) ? ($property[$k]) : ('')).$this->_eof;

	return $record.$this->_eor;
    }
    
    public function tablify()
    {
	$table = '<table border="1"><thead><tr>';
	$data = str_replace(array('#DATA#'), '', $this->_data());
	foreach($this->_definitions as $th => $ignore)
		$table .='<th>'.$th.'</th>';
	$table .= '</tr><tbody>';
	foreach(explode($this->_eor, $data) as $tr)
	{
	    $table .= '<tr>';
		foreach(explode($this->_eof, $tr) as $td)
		    $table .='<td>'.$td.'</td>';
	    $table .= '</tr>';
	}
	return $table.'</tbody></table>';
    }
    
}


/**
 * EXCEPTIONS 
 */
class EmptyPropertyDataException extends Exception {}
class PropertyFieldException extends Exception 
{
    public function __construct($key = null, $val = NULL, $code = 0, Exception $previous = null)
    {
	$message = $this->message.': '.$key;
	if($val != NULL)
	    $message .= ' = '.$val;
	parent::__construct($message, $code, $previous);
    }
}
class PropertyFieldTooBig extends PropertyFieldException 
{
    protected $message = 'The following field is too long';
}
class PropertyFieldNotCharacter extends PropertyFieldException 
{
    protected $message = 'The following field is not a valid character';
}
class PropertyFieldNotInteger extends PropertyFieldException 
{
    protected $message = 'The following field is not a valid integer';
}
class MissingRequiredFieldsException extends PropertyFieldException 
{
    protected $message = 'The property data is missing a required field';
}
class InvalidRightMoveFieldData extends PropertyFieldException
{
    protected $message = 'The following field does not match RightMove\'s allowed data for this field';
}


// End of file