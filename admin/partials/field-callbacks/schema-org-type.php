<?php
/**
 * SCallback for the Schema organization type field.
 *
 * @package    Big_Santa_Anita_Canyon_Cabins
 * @subpackage Admin\Partials\Field_Callbacks
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */

namespace BSAC_Cabins\Admin\Partials\Field_Callbacks;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$types = [

	// First option save null.
	null          => __( 'Select one&hellip;', 'bsac-cabins' ),
	'Airline'     => __( 'Airline', 'bsac-cabins' ),
	'Corporation' => __( 'Corporation', 'bsac-cabins' ),

	// Educational Organizations.
	'EducationalOrganization' => __( 'Educational Organization', 'bsac-cabins' ),
		'CollegeOrUniversity' => __( '— College or University', 'bsac-cabins' ),
		'ElementarySchool'    => __( '— Elementary School', 'bsac-cabins' ),
		'HighSchool'          => __( '— High School', 'bsac-cabins' ),
		'MiddleSchool'        => __( '— Middle School', 'bsac-cabins' ),
		'Preschool'           => __( '— Preschool', 'bsac-cabins' ),
		'School'              => __( '— School', 'bsac-cabins' ),

	'GovernmentOrganization'  => __( 'Government Organization', 'bsac-cabins' ),

	// Local Businesses.
	'LocalBusiness' => __( 'Local Business', 'bsac-cabins' ),
		'AnimalShelter' => __( '— Animal Shelter', 'bsac-cabins' ),

		// Automotive Businesses.
		'AutomotiveBusiness' => __( '— Automotive Business', 'bsac-cabins' ),
			'AutoBodyShop'     => __( '—— Auto Body Shop', 'bsac-cabins' ),
			'AutoDealer'       => __( '—— Auto Dealer', 'bsac-cabins' ),
			'AutoPartsStore'   => __( '—— Auto Parts Store', 'bsac-cabins' ),
			'AutoRental'       => __( '—— Auto Rental', 'bsac-cabins' ),
			'AutoRepair'       => __( '—— Auto Repair', 'bsac-cabins' ),
			'AutoWash'         => __( '—— Auto Wash', 'bsac-cabins' ),
			'GasStation'       => __( '—— Gas Station', 'bsac-cabins' ),
			'MotorcycleDealer' => __( '—— Motorcycle Dealer', 'bsac-cabins' ),
			'MotorcycleRepair' => __( '—— Motorcycle Repair', 'bsac-cabins' ),

		'ChildCare'            => __( '— Child Care', 'bsac-cabins' ),
		'Dentist'              => __( '— Dentist', 'bsac-cabins' ),
		'DryCleaningOrLaundry' => __( '— Dry Cleaning or Laundry', 'bsac-cabins' ),

		// Emergency Services.
		'EmergencyService' => __( '— Emergency Service', 'bsac-cabins' ),
			'FireStation'   => __( '—— Fire Station', 'bsac-cabins' ),
			'Hospital'      => __( '—— Hospital', 'bsac-cabins' ),
			'PoliceStation' => __( '—— Police Station', 'bsac-cabins' ),

		'EmploymentAgency' => __( '— Employment Agency', 'bsac-cabins' ),

		// Entertainment Businesses.
		'EntertainmentBusiness' => __( '— Entertainment Business', 'bsac-cabins' ),
			'AdultEntertainment' => __( '—— Adult Entertainment', 'bsac-cabins' ),
			'AmusementPark'      => __( '—— Amusement Park', 'bsac-cabins' ),
			'ArtGallery'         => __( '—— Art Gallery', 'bsac-cabins' ),
			'Casino'             => __( '—— Casino', 'bsac-cabins' ),
			'ComedyClub'         => __( '—— Comedy Club', 'bsac-cabins' ),
			'MovieTheater'       => __( '—— Movie Theater', 'bsac-cabins' ),
			'NightClub'          => __( '—— Night Club', 'bsac-cabins' ),

		// Financial Services.
		'FinancialService' => __( '— Financial Service', 'bsac-cabins' ),
			'AccountingService' => __( '—— Accounting Service', 'bsac-cabins' ),
			'AutomatedTeller'   => __( '—— Automated Teller', 'bsac-cabins' ),
			'BankOrCreditUnion' => __( '—— Bank or Credit Union', 'bsac-cabins' ),
			'InsuranceAgency'   => __( '—— Insurance Agency', 'bsac-cabins' ),

		// Food Establishments.
		'FoodEstablishment' => __( '— Food Establishment', 'bsac-cabins' ),
			'Bakery'             => __( '—— Bakery', 'bsac-cabins' ),
			'BarOrPub'           => __( '—— Bar or Pub', 'bsac-cabins' ),
			'Brewery'            => __( '—— Brewery', 'bsac-cabins' ),
			'CafeOrCoffeeShop'   => __( '—— Cafe or Coffee Shop', 'bsac-cabins' ),
			'FastFoodRestaurant' => __( '—— Fast Food Restaurant', 'bsac-cabins' ),
			'IceCreamShop'       => __( '—— Ice Cream Shop', 'bsac-cabins' ),
			'Restaurant'         => __( '—— Restaurant', 'bsac-cabins' ),
			'Winery'             => __( '—— Winery', 'bsac-cabins' ),

		// Government Offices.
		'GovernmentOffice' => __( '— Government Office', 'bsac-cabins' ),
			'PostOffice' => __( '—— Post Office', 'bsac-cabins' ),

		// Health and Beauty Businesses.
		'HealthAndBeautyBusiness' => __( '— Health and Beauty Business', 'bsac-cabins' ),
			'BeautySalon'  => __( '—— Beauty Salon', 'bsac-cabins' ),
			'DaySpa'       => __( '—— Day Spa', 'bsac-cabins' ),
			'HairSalon'    => __( '—— Hair Salon', 'bsac-cabins' ),
			'HealthClub'   => __( '—— Health Club', 'bsac-cabins' ),
			'NailSalon'    => __( '—— Nail Salon', 'bsac-cabins' ),
			'TattooParlor' => __( '—— Tattoo Parlor', 'bsac-cabins' ),

		// Home and Construction Businesses.
		'HomeAndConstructionBusiness' => __( '— Home and Construction Business', 'bsac-cabins' ),
			'Electrician'       => __( '—— Electrician', 'bsac-cabins' ),
			'GeneralContractor' => __( '—— General Contractor', 'bsac-cabins' ),
			'HVACBusiness'      => __( '—— HVAC Business', 'bsac-cabins' ),
			'HousePainter'      => __( '—— House Painter', 'bsac-cabins' ),
			'Locksmith'         => __( '—— Locksmith', 'bsac-cabins' ),
			'MovingCompany'     => __( '—— MovingCompany', 'bsac-cabins' ),
			'Plumber'           => __( '—— Plumber', 'bsac-cabins' ),
			'RoofingContractor' => __( '—— Roofing Contractor', 'bsac-cabins' ),

		'InternetCafe' => __( '— Internet Cafe', 'bsac-cabins' ),

		// Legal Services.
		'LegalService' => __( '— Legal Service', 'bsac-cabins' ),
			'Attorney' => __( '—— Attorney', 'bsac-cabins' ),
			'Notary'   => __( '—— Notary', 'bsac-cabins' ),

		'Library' => __( '— Library', 'bsac-cabins' ),

		// Lodging Businesses.
		'LodgingBusiness' => __( '— Lodging Business', 'bsac-cabins' ),
			'BedAndBreakfast' => __( '—— Bed and Breakfast', 'bsac-cabins' ),
			'Campground'      => __( '—— Campground', 'bsac-cabins' ),
			'Hostel'          => __( '—— Hostel', 'bsac-cabins' ),
			'Hotel'           => __( '—— Hotel', 'bsac-cabins' ),
			'Motel'           => __( '—— Motel', 'bsac-cabins' ),
			'Resort'          => __( '—— Resort', 'bsac-cabins' ),

		'ProfessionalService' => __( '— Professional Service', 'bsac-cabins' ),
		'RadioStation'        => __( '— Radio Station', 'bsac-cabins' ),
		'RealEstateAgent'     => __( '— Real Estate Agent', 'bsac-cabins' ),
		'RecyclingCenter'     => __( '— Recycling Center', 'bsac-cabins' ),
		'SelfStorage'         => __( '— Self Storage', 'bsac-cabins' ),
		'ShoppingCenter'      => __( '— Shopping Center', 'bsac-cabins' ),

		// Sports Activity Locations.
		'SportsActivityLocation' => __( '— Sports Activity Location', 'bsac-cabins' ),
			'BowlingAlley'       => __( '—— Bowling Alley', 'bsac-cabins' ),
			'ExerciseGym'        => __( '—— Exercise Gym', 'bsac-cabins' ),
			'GolfCourse'         => __( '—— Golf Course', 'bsac-cabins' ),
			'HealthClub'         => __( '—— Health Club', 'bsac-cabins' ),
			'PublicSwimmingPool' => __( '—— Public Swimming Pool', 'bsac-cabins' ),
			'SkiResort'          => __( '—— Ski Resort', 'bsac-cabins' ),
			'SportsClub'         => __( '—— Sports Club', 'bsac-cabins' ),
			'StadiumOrArena'     => __( '—— Stadium or Arena', 'bsac-cabins' ),
			'TennisComplex'      => __( '—— Tennis Complex', 'bsac-cabins' ),

		// Store types.
		'Store' => __( '— Store', 'bsac-cabins' ),
			'AutoPartsStore'      => __( '—— Auto Parts Store', 'bsac-cabins' ),
			'BikeStore'           => __( '—— Bike Store', 'bsac-cabins' ),
			'BookStore'           => __( '—— Book Store', 'bsac-cabins' ),
			'ClothingStore'       => __( '—— Clothing Store', 'bsac-cabins' ),
			'ComputerStore'       => __( '—— Computer Store', 'bsac-cabins' ),
			'ConvenienceStore'    => __( '—— Convenience Store', 'bsac-cabins' ),
			'DepartmentStore'     => __( '—— Department Store', 'bsac-cabins' ),
			'ElectronicsStore'    => __( '—— Electronics Store', 'bsac-cabins' ),
			'Florist'             => __( '—— Florist', 'bsac-cabins' ),
			'FurnitureStore'      => __( '—— Furniture Store', 'bsac-cabins' ),
			'GardenStore'         => __( '—— Garden Store', 'bsac-cabins' ),
			'GroceryStore'        => __( '—— Grocery Store', 'bsac-cabins' ),
			'HardwareStore'       => __( '—— Hardware Store', 'bsac-cabins' ),
			'HobbyShop'           => __( '—— Hobby Shop', 'bsac-cabins' ),
			'HomeGoodsStore'      => __( '—— Home Goods Store', 'bsac-cabins' ),
			'JewelryStore'        => __( '—— Jewelry Store', 'bsac-cabins' ),
			'LiquorStore'         => __( '—— Liquor Store', 'bsac-cabins' ),
			'MensClothingStore'   => __( '—— Mens Clothing Store', 'bsac-cabins' ),
			'MobilePhoneStore'    => __( '—— Mobile Phone Store', 'bsac-cabins' ),
			'MovieRentalStore'    => __( '—— Movie Rental Store', 'bsac-cabins' ),
			'MusicStore'          => __( '—— Music Store', 'bsac-cabins' ),
			'OfficeEquipmentStore'=> __( '—— Office Equipment Store', 'bsac-cabins' ),
			'OutletStore'         => __( '—— Outlet Store', 'bsac-cabins' ),
			'PawnShop'            => __( '—— Pawn Shop', 'bsac-cabins' ),
			'PetStore'            => __( '—— Pet Store', 'bsac-cabins' ),
			'ShoeStore'           => __( '—— Shoe Store', 'bsac-cabins' ),
			'SportingGoodsStore'  => __( '—— Sporting Goods Store', 'bsac-cabins' ),
			'TireShop'            => __( '—— Tire Shop', 'bsac-cabins' ),
			'ToyStore'            => __( '—— Toy Store', 'bsac-cabins' ),
			'WholesaleStore'      => __( '—— Wholesale Store', 'bsac-cabins' ),

		'TelevisionStation'        => __( '— Television Station', 'bsac-cabins' ),
		'TouristInformationCenter' => __( '— Tourist Information Center', 'bsac-cabins' ),
		'TravelAgency'             => __( '— Travel Agency', 'bsac-cabins' ),

	'MedicalOrganization' => __( 'Medical Organization', 'bsac-cabins' ),
	'NGO'                 => __( 'NGO (Non-Governmental Organization', 'bsac-cabins' ),
	'PerformingGroup'     => __( 'Performing Group', 'bsac-cabins' ),
	'SportsOrganization'  => __( 'Sports Organization', 'bsac-cabins' )
];

$options = get_option( 'schema_org_type' );

$html = '<p><select id="schema_org_type" name="schema_org_type">';

foreach( $types as $type => $value ) {

	$selected = ( $options == $type ) ? 'selected="' . esc_attr( 'selected' ) . '"' : '';

	$html .= '<option value="' . esc_attr( $type ) . '" ' . $selected . '>' . esc_html( $value ) . '</option>';

}

$html .= '</select>';
$html .= sprintf(
	'<label for="schema_org_type"> %1s</label> <a href="%2s" target="_blank" class="tooltip" title="%3s"><span class="dashicons dashicons-editor-help"></span></a>',
	$args[0],
	esc_attr( esc_url( 'https://schema.org/docs/full.html#C.Organization' ) ),
	esc_attr( __( 'Read documentation for organization types', 'bsac-cabins' ) )
);
$html .= '</p>';

echo $html;