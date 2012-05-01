<?php

/**
 * Symud is a RightMove BLM builder and parser
 *
 * @author David Morris
 */
class Symud {
    
    
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
    
    protected static $rightmove_fields = array (
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
    
    /**
     * Load properties from database
     * Recursively add to the $rightmove_fields array.
     * @return array
     */
    public function loadProperties(){
        
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
    
    public function loadImages($sourceDirectory,$branchid,$destinationDirectory){
        
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
    public function loadFLP($sourceDirectory,$branchid,$destinationDirectory){
        
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
    public function loadDOC($sourceDirectory,$branchid,$destinationDirectory){
        
    }
    
    
    /**
     * Creates a ZIP file of the media for upload.
     */
    
    public function creatMediaZip(){
        
    }
    
    /**
     * Writes the BLM file
     * @return type boolean 
     */
    public function blmOut(){
    return $success();    
    }
    
}

// End of file