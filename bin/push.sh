#!/bin/bash
npm install
npm run build
mkdir jasmine
cp -r assets jasmine
cp -r component jasmine
cp -r core jasmine
cp ./*.php jasmine
cp LICENSE jasmine
cp RAEDME.md jasmine
cp screenshot.png jasmine