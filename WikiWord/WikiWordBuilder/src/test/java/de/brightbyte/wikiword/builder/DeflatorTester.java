package de.brightbyte.wikiword.builder;

import java.io.File;
import java.io.IOException;
import java.util.zip.DataFormatException;
import java.util.zip.Deflater;
import java.util.zip.Inflater;

import de.brightbyte.io.IOUtil;
import de.brightbyte.util.StringUtils;

public class DeflatorTester {
	public static void main(String[] args) throws IOException, DataFormatException {
        byte[] input = "Trying to invoke setDictionary twice twice twice".getBytes();
        byte[] input2 = "One more time I wanna dance now".getBytes();
        byte[] output = new byte[100];
        byte[] output2 = new byte[100];
        Deflater def = new Deflater();
        //def.setLevel(Deflater.BEST_COMPRESSION);
        //def.setStrategy(Deflater.HUFFMAN_ONLY);
        def.setDictionary("Trying to invoke setDictionary twice twice twice".getBytes());

        def.setInput(input);
        def.finish();
        int compressedLen = def.deflate(output);
        System.out.println(StringUtils.hex(output, 0, compressedLen)+ " size " + (input.length-compressedLen+6));

        def.reset();
        def.setDictionary("Trying to invoke setDictionary twice twice twice".getBytes());
        def.setInput(input2);
        def.finish();
        int compressedLen2 = def.deflate(output2);
        System.out.println(StringUtils.hex(output2, 0, compressedLen2) + " size " + (input2.length-compressedLen2+6));

       Inflater inf = new Inflater();
        inf.setInput(output, 0, compressedLen);
        byte[] result = new byte[100];
        if (inf.inflate(result)== 0 && inf.needsDictionary()) {
        System.out.println("inf adler: " + inf.getAdler());
            inf.setDictionary("Trying to invoke setDictionary twice twice twice".getBytes());
            inf.inflate(result);
        }
	}
}
