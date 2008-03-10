/* Cortado - a video player java applet
 * Copyright (C) 2004 Fluendo S.L.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Street #330, Boston, MA 02111-1307, USA.
 */

package com.fluendo.jst;

public class Format {
  public static final int UNKNOWN = 0;
  public static final int DEFAULT = 1;
  public static final int BYTES = 2;
  public static final int TIME = 3;
  public static final int BUFFERS = 4;
  public static final int PERCENT = 5;

  public static final long PERCENT_MAX = 1000000;
  public static final long PERCENT_SCALE = 10000;
}
