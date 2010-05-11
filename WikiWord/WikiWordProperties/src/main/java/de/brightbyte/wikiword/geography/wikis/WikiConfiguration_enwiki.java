package de.brightbyte.wikiword.geography.wikis;

import java.util.Set;

import de.brightbyte.wikiword.ConceptType;
import de.brightbyte.wikiword.analyzer.AnalyzerUtils;
import de.brightbyte.wikiword.analyzer.WikiConfiguration;
import de.brightbyte.wikiword.analyzer.WikiPage;
import de.brightbyte.wikiword.analyzer.extractor.TemplateParameterExtractor;
import de.brightbyte.wikiword.analyzer.matcher.PatternNameMatcher;
import de.brightbyte.wikiword.analyzer.sensor.HasPropertySensor;
import de.brightbyte.wikiword.analyzer.template.DefaultTemplateParameterPropertySpec;
import de.brightbyte.wikiword.analyzer.template.TemplateData;
import de.brightbyte.wikiword.analyzer.template.TemplateParameterPropertySpec;

public class WikiConfiguration_enwiki extends WikiConfiguration {

	protected static class CoordinatePropertySpec implements TemplateParameterPropertySpec {
		protected String name;

		protected String lat_deg;
		protected String lat_min;
		protected String lat_sec;
		protected String lat_NS;
		
		protected String long_deg;
		protected String long_min;
		protected String long_sec;
		protected String long_EW;

		public CoordinatePropertySpec(String name, String lat_deg, String lat_min, String lat_sec, String lat_NS, String long_deg, String long_min, String long_sec, String long_EW) {
			super();
			this.name = name;
			this.lat_deg = lat_deg;
			this.lat_min = lat_min;
			this.lat_sec = lat_sec;
			this.lat_NS = lat_NS;
			this.long_deg = long_deg;
			this.long_min = long_min;
			this.long_sec = long_sec;
			this.long_EW = long_EW;
		}

		public String getPropertyName() {
			return name;
		}

		public Set<CharSequence> getPropertyValues(WikiPage page, TemplateData params, Set<CharSequence> intoValues) {
			StringBuilder b = new StringBuilder();

			if (params.getParameter(lat_deg)==null) return intoValues;
			if (params.getParameter(long_deg)==null) return intoValues;
			
			addChunk(params, lat_deg, "°", b);
			addChunk(params, lat_min, "'", b);
			addChunk(params, lat_sec, "\"", b);
			addChunk(params, lat_NS, null, b);

			b.append(" ");
			
			addChunk(params, long_deg, "°", b);
			addChunk(params, long_min, "'", b);
			addChunk(params, long_sec, "\"", b);
			addChunk(params, long_EW, null, b);
			
			intoValues = addValue(b, page, intoValues);
			return intoValues;
		}
		
		protected boolean addChunk(TemplateData params, CharSequence key, String unit, StringBuilder buffer) {
			if (key==null) return false;

			CharSequence v = params.getParameter(key);
			if (v==null) return false;
		
			buffer.append(v);
			if (unit!=null) buffer.append(unit);
			
			return true;
		}
		
		protected Set<CharSequence> addValue(CharSequence w, WikiPage page, Set<CharSequence> intoValues) {
			if (w==null || w.length()==0) return intoValues;
			
			w = AnalyzerUtils.trim(w);
			if (w.length()==0) return intoValues;
			
			intoValues = AnalyzerUtils.addToSet(intoValues, w);
			return intoValues;
		}
		
	}
	
	protected static class Positional8CoordinatePropertySpec extends CoordinatePropertySpec {
		public Positional8CoordinatePropertySpec(String name) {
			super(name, "1", "2", "3", "4", "5", "6", "7", "8");
		}
		
		public Set<CharSequence> getPropertyValues(WikiPage page, TemplateData params, Set<CharSequence> intoValues) {
			if (params.getParameter("8")==null || params.getParameter("10")!=null) return intoValues;
			return super.getPropertyValues(page, params, intoValues);
		}
	}
	
	protected static class Positional6CoordinatePropertySpec extends CoordinatePropertySpec {
		public Positional6CoordinatePropertySpec(String name) {
			super(name, "1", "2", null, "3", "4", "5", null, "6");
		}
		
		public Set<CharSequence> getPropertyValues(WikiPage page, TemplateData params, Set<CharSequence> intoValues) {
			if (params.getParameter("6")==null || params.getParameter("8")!=null) return intoValues;
			return super.getPropertyValues(page, params, intoValues);
		}
	}
	
	protected static class Positional4CoordinatePropertySpec extends CoordinatePropertySpec {
		public Positional4CoordinatePropertySpec(String name) {
			super(name, "1", null, null, "2", "3", null, null, "4");
		}
		
		public Set<CharSequence> getPropertyValues(WikiPage page, TemplateData params, Set<CharSequence> intoValues) {
			if (params.getParameter("4")==null || params.getParameter("6")!=null) return intoValues;
			return super.getPropertyValues(page, params, intoValues);
		}
	}
	
	protected static class Positional2CoordinatePropertySpec extends CoordinatePropertySpec {
		public Positional2CoordinatePropertySpec(String name) {
			super(name, "1", null, null, null, "2", null, null, null);
		}
		
		public Set<CharSequence> getPropertyValues(WikiPage page, TemplateData params, Set<CharSequence> intoValues) {
			if (params.getParameter("2")==null || params.getParameter("4")!=null) return intoValues;
			return super.getPropertyValues(page, params, intoValues);
		}
	}
	
	public WikiConfiguration_enwiki() {
		super();
		
		nestedTemplateFields.put("Protbox", "coord");
		nestedTemplateFields.put("Protbox", "coords");
		nestedTemplateFields.put("Protbox", "coordinates");

		//XXX: coord may appear nested. check if it works.
		propertyExtractors.add( new TemplateParameterExtractor(new PatternNameMatcher("(.*\\.coords?::)?[Cc]oord", 0, true),
				new Positional8CoordinatePropertySpec( "position"),
				new Positional6CoordinatePropertySpec( "position"),
				new Positional4CoordinatePropertySpec( "position"),
				new Positional2CoordinatePropertySpec( "position")
		) );
		
		propertyExtractors.add( new TemplateParameterExtractor(new PatternNameMatcher("(Infobox_.*|.*box)", 0, true),
				new DefaultTemplateParameterPropertySpec("name", "place-name").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("native_name", "place-name").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("common_name", "place-name").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("conventional_long_name", "place-name").setStripMarkup(true),

				new DefaultTemplateParameterPropertySpec("area_magnitude", "area-magnitude").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("area", "area").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("area_km2", "area-km2").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("area_sq_mi", "area-mi2").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("area_total_km2", "area-km2").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("area_total_sq_mi", "area-mi2").setStripMarkup(true),

				new DefaultTemplateParameterPropertySpec("elevation", "elevation").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("elevation_m", "elevation-m").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("elevation_ft", "elevation-ft").setStripMarkup(true),
				
				new DefaultTemplateParameterPropertySpec("timezone", "time-zone").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("time_zone", "time-zone").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("utc_offset", "time-zone").setStripMarkup(true),
				
				new DefaultTemplateParameterPropertySpec("population_census", "population").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("population_total", "population").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("population_density_km2", "population-density-km2").setStripMarkup(true),
				new DefaultTemplateParameterPropertySpec("population_density_sq_mi", "population-density-mi2").setStripMarkup(true),

				new CoordinatePropertySpec( "coordinates", "latd", "latm", "lats", "latNS", "longd", "longm", "longs", "longEW"),
				new CoordinatePropertySpec( "coordinates", "lat_d", "lat_m", "lat_s", "lat_NS", "long_d", "long_m", "long_s", "long_EW"),
				new CoordinatePropertySpec( "coordinates", "lat_deg", "lat_min", "lat_sec", "lat_NS", "lon_deg", "lon_min", "lon_sec", "lon_EW"),
				new CoordinatePropertySpec( "coordinates", "lat_deg", "lat_min", "lat_sec", "lat_NS", "long_deg", "long_min", "long_sec", "long_EW")
		) );
		
		conceptTypeSensors.add( new HasPropertySensor<ConceptType>(ConceptType.PLACE, "area") );
		conceptTypeSensors.add( new HasPropertySensor<ConceptType>(ConceptType.PLACE, "area-km2") );
		conceptTypeSensors.add( new HasPropertySensor<ConceptType>(ConceptType.PLACE, "area-mi2") );
		conceptTypeSensors.add( new HasPropertySensor<ConceptType>(ConceptType.PLACE, "population") );
	}
	
}
